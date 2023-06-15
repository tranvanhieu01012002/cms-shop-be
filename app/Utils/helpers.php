<?php

use Illuminate\Support\Facades\Storage;
if (!function_exists("generateUploadUrl")) {
    function generateUploadUrl(string $url)
    {
        $time = 10;
        return Storage::temporaryUploadUrl($url, now()->addMinutes($time));
    }
}

if (!function_exists("generateUrl")) {
    function generateUrl(string $url)
    {
        $time = 10;
        return Storage::temporaryUrl($url, now()->addMinutes($time));
    }
}

