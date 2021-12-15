<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $datas = [
            [
                "type" => "site_title",
                "value" => 'ILEGSOSA',
            ],
            [
                "type" => "site_description",
                "value" => '',
            ],
            [
                "type" => "theme_color",
                "value" => '',
            ],
            [
                "type" => "site_logo",
                "value" => '',
            ],
            [
                "type" => "site_favicon",
                "value" => '',
            ],
            [
                "type" => "author_mail",
                "value" => '',
            ],
            [
                "type" => "author_phone_number",
                "value" => '',
            ],
            [
                "type" => "election_start_date",
                "value" => now(),
            ],
            [
                "type" => "election_end_date",
                "value" => now(),
            ],
            [
                "type" => "start_election",
                "value" => true,
            ],
            [
                "type" => "new_user_verification",
                "value" => true,
            ],
            [
                "type" => "auto_connect",
                "value" => true,
            ],
        ];

        foreach ($datas as $data) {
            $existing = Setting::where('type', $data['type'])->get();
            if (!$existing->isEmpty()) {
                continue;
            }
            Setting::create($data);
        }
    }
}
