<?php
namespace App\Utils;

class TextHelper
{
    public function sanitize(string $text): string
    {
        $text = preg_replace('@<(\w+)\b.*?>.*?<\/\w+\s*>@i', '', $text);
        $text = preg_replace('/[^A-Za-z0-9\-\s\']/', '', $text);
        $text = filter_var($text, FILTER_SANITIZE_STRING);
        return $text;
    }
}