<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('truncateSynopsis')) {
    function truncateSynopsis($text, $maxLength = 100) {
        if (strlen($text) > $maxLength) {
            $truncated = substr($text, 0, $maxLength);
            $truncated = rtrim($truncated, "!,.-");
            $truncated = substr($truncated, 0, strrpos($truncated, ' '));
            return $truncated . '...';
        }
        return $text;
    }
}
