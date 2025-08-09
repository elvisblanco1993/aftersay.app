<x-mail::message>

<div class="prose max-w-full">
    {!! $message !!}
</div>

<x-mail::button :url="$url">
Leave a Review
</x-mail::button>

<a href="#">Already left a review</a>

{{ $signature ?? __("Kind regards") }}

</x-mail::message>
