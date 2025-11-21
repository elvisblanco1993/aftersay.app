<?php

/**
 * HelpSpot Live Lookup Integration Script (PHP)
 *
 * This script connects to the dummyjson.com user search API, fetches user data,
 * and formats the response as XML for HelpSpot's Live Lookup feature.
 *
 * It implements prioritized search logic, checking for multiple GET parameters
 * (customer_id, email, last_name, first_name) to determine the search query.
 *
 * FIX: The final closing PHP tag '?>' has been removed, and all XML output
 * is now strictly controlled by 'echo' to prevent the "Invalid document end" error.
 */

// -----------------------------------------------------------------------------
// 1. Configuration & Setup
// -----------------------------------------------------------------------------

// Set the API endpoint
const DUMMY_API_URL = 'https://dummyjson.com/users/search?q=';

// Initialize search query
$search_query = '';

// -----------------------------------------------------------------------------
// 2. Prioritized Search Query Determination (Matches MySQL Logic)
// -----------------------------------------------------------------------------

// This logic attempts to find the most specific parameter passed by HelpSpot.
if (!empty($_GET['customer_id'])) {
    // 1. If an ID is passed in, use that for the search.
    $search_query = trim($_GET['customer_id']);
} elseif (!empty($_GET['email'])) {
    // 2. If no ID, try searching by email.
    $search_query = trim($_GET['email']);
} elseif (!empty($_GET['last_name'])) {
    // 3. If no ID or email, search on last name.
    $search_query = trim($_GET['last_name']);
} elseif (!empty($_GET['first_name'])) {
    // 4. Try first name if nothing else is available.
    $search_query = trim($_GET['first_name']);
}

// -----------------------------------------------------------------------------
// 3. Error Handling for No Query
// -----------------------------------------------------------------------------

// If no query is provided, return an empty XML response immediately (1=0 equivalent)
if (empty($search_query)) {
    // Output XML headers and empty livelookup tag
    header('Content-Type: text/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="utf-8"?><livelookup/>';
    // NOTE: Closing PHP tag is omitted to prevent whitespace issues.
    exit;
}

// -----------------------------------------------------------------------------
// 4. API Call using cURL
// -----------------------------------------------------------------------------

// The dummyjson API uses 'q' for the search term, which is now populated by
// one of the prioritized GET parameters above.
$api_url = DUMMY_API_URL . urlencode($search_query);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Set a timeout to prevent hanging

$json_response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

// -----------------------------------------------------------------------------
// 5. API Response Processing
// -----------------------------------------------------------------------------

// Handle cURL and HTTP errors
if ($json_response === false || $http_code !== 200) {
    // Return empty result to HelpSpot to avoid disruption
    header('Content-Type: text/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="utf-8"?><livelookup/>';
    // NOTE: Closing PHP tag is omitted to prevent whitespace issues.
    exit;
}

// Decode the JSON response
$data = json_decode($json_response, true);

// Check if decoding was successful and if the 'users' array exists
if ($data === null || !isset($data['users']) || !is_array($data['users'])) {
    header('Content-Type: text/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="utf-8"?><livelookup/>';
    // NOTE: Closing PHP tag is omitted to prevent whitespace issues.
    exit;
}

// -----------------------------------------------------------------------------
// 6. Generate HelpSpot Live Lookup XML (Strict Procedural Output)
// -----------------------------------------------------------------------------

// Set the response header
header('Content-Type: text/xml; charset=ISO-8859-1');

// Start the XML structure
$xml_output = '<?xml version="1.0" encoding="ISO-8859-1"?>';
$xml_output .= '<livelookup version="1.0" columns="first_name,last_name,email">';

// Loop through users and build the <customer> records
foreach ($data['users'] as $user) {
    // Get fields with null-coalescing and ensure they are properly escaped for XML
    $id = htmlspecialchars($user['id'] ?? '');
    $first_name = htmlspecialchars($user['firstName'] ?? '');
    $last_name = htmlspecialchars($user['lastName'] ?? '');
    $email = htmlspecialchars($user['email'] ?? '');
    $phone = htmlspecialchars($user['phone'] ?? '');
    
    $xml_output .= "
    <customer>
        <customer_id>{$id}</customer_id>
        <first_name>{$first_name}</first_name>
        <last_name>{$last_name}</last_name>
        <email>{$email}</email>
        <phone>{$phone}</phone>
    </customer>";
}

// Close the XML structure
$xml_output .= '</livelookup>';

// Output the final XML
echo $xml_output;

// NOTE: The final closing PHP tag '?>' is intentionally omitted here to prevent
// accidental output of trailing whitespace, which causes the "Invalid document end" XML error.