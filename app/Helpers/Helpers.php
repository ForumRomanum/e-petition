<?php

namespace App\Helpers;

class Helpers
{
    public static function htmlToText(string $html): string
    {
        return preg_replace("/\n\s+/", "\n",
            trim(html_entity_decode(strip_tags($html)))
        );
    }

    public static function isProduction(): bool
    {
        return env('APP_ENV') === 'production';
    }
}
