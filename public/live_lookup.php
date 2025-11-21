<?php

/**
 * HelpSpot Live Lookup Integration with DummyJSON Users API
 *
 * This script integrates the dummyjson.com users API with HelpSpot's Live Lookup feature.
 * It searches for users and returns results in HelpSpot's required XML format.
 *
 * Usage: Deploy this script to a web-accessible location and configure the URL in
 * HelpSpot Admin -> Settings -> Live Lookup (HTTP mode)
 */

// Set headers for XML output
header('Content-Type: text/xml; charset=utf-8');

// Enable error logging (disable display for production)
ini_set('display_errors', 0);
ini_set('log_errors', 1);

/**
 * Get search query from HelpSpot parameters
 * HelpSpot passes customer information as GET parameters
 */
function getSearchQuery()
{
    $searchTerms = [];

    // Check for available search parameters from HelpSpot
    if (! empty($_GET['first_name'])) {
        $searchTerms[] = $_GET['first_name'];
    }
    if (! empty($_GET['last_name'])) {
        $searchTerms[] = $_GET['last_name'];
    }
    if (! empty($_GET['email'])) {
        $searchTerms[] = $_GET['email'];
    }

    // If no parameters provided, return empty string
    if (empty($searchTerms)) {
        return '';
    }

    // Combine search terms with space
    return implode(' ', $searchTerms);
}

/**
 * Search the DummyJSON API
 *
 * @param  string  $query  Search query
 * @return array|null Array of users or null on failure
 */
function searchDummyJsonAPI($query)
{
    if (empty($query)) {
        return null;
    }

    // Build API URL with encoded query
    $apiUrl = 'https://dummyjson.com/users/search?q='.urlencode($query);

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    // Execute request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    // Check for errors
    if ($error) {
        error_log('DummyJSON API Error: '.$error);

        return null;
    }

    if ($httpCode !== 200) {
        error_log('DummyJSON API returned HTTP code: '.$httpCode);

        return null;
    }

    // Decode JSON response
    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('JSON decode error: '.json_last_error_msg());

        return null;
    }

    // Return users array
    return isset($data['users']) ? $data['users'] : null;
}

/**
 * Escape XML special characters
 *
 * @param  string  $text  Text to escape
 * @return string Escaped text
 */
function xmlEscape($text)
{
    return htmlspecialchars($text, ENT_XML1, 'UTF-8');
}

/**
 * Generate HelpSpot Live Lookup XML response
 *
 * @param  array|null  $users  Array of user data
 * @return string XML response
 */
function generateLiveLookupXML($users)
{
    $xml = '<?xml version="1.0" encoding="utf-8"?>'."\n";

    // Root element with columns to display for multiple matches
    $xml .= '<livelookup version="1.0" columns="first_name,last_name,email">'."\n";

    // If we have users, add customer elements
    if (! empty($users) && is_array($users)) {
        foreach ($users as $user) {
            $xml .= "  <customer>\n";

            // Required: customer_id (using the user's id from API)
            $xml .= '    <customer_id>'.xmlEscape($user['id'])."</customer_id>\n";

            // Standard HelpSpot fields
            if (isset($user['firstName'])) {
                $xml .= '    <first_name>'.xmlEscape($user['firstName'])."</first_name>\n";
            }

            if (isset($user['lastName'])) {
                $xml .= '    <last_name>'.xmlEscape($user['lastName'])."</last_name>\n";
            }

            if (isset($user['email'])) {
                $xml .= '    <email>'.xmlEscape($user['email'])."</email>\n";
            }

            if (isset($user['phone'])) {
                $xml .= '    <phone>'.xmlEscape($user['phone'])."</phone>\n";
            }

            $xml .= "  </customer>\n";
        }
    }

    $xml .= '</livelookup>';

    return $xml;
}

// Main execution
try {
    // Get search query from HelpSpot parameters
    $searchQuery = getSearchQuery();

    // Search the API
    $users = searchDummyJsonAPI($searchQuery);

    // Generate and output XML response
    echo generateLiveLookupXML($users);

} catch (Exception $e) {
    // Log error and return empty result set
    error_log('HelpSpot Live Lookup Error: '.$e->getMessage());

    // Return empty XML (no results found)
    echo '<?xml version="1.0" encoding="utf-8"?>'."\n";
    echo '<livelookup version="1.0" columns="first_name,last_name,email">'."\n";
    echo '</livelookup>';
}
