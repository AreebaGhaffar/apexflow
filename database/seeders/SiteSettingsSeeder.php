<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name',      'value' => 'Apex Flow Technical Services LLC'],
            ['key' => 'phone',          'value' => '+971 50 000 0000'],
            ['key' => 'whatsapp',       'value' => '971500000000'],
            ['key' => 'email',          'value' => 'info@apexflow.ae'],
            ['key' => 'address',        'value' => 'Dubai, UAE'],
            ['key' => 'working_hours',  'value' => 'Saturday - Thursday: 8AM - 8PM'],
            ['key' => 'hero_title',     'value' => 'Expert Plumbing & Maintenance in UAE'],
            ['key' => 'hero_subtitle',  'value' => 'Fast, reliable, professional plumbing services for homes and businesses.'],
            ['key' => 'about_text',     'value' => 'Apex Flow Technical Services LLC is a professional plumbing and maintenance company based in the UAE. We provide fast, reliable, and high-quality services for residential and commercial properties.'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}