<?php
namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    // public string $site_name;

    // public bool $site_active;

    public string $company_logo;

    public static function group(): string
    {
        return 'general';
    }
}
