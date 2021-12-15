<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                "first_name" => "Ilegsosa",
                "last_name" => "Ilegsosa",
                "email" => "support@ilegsosa.org",
                "phone" => "07060007000",
                "password" => "12345678",
                "verified" => 1,
                "role_id" => 1,
                "set_id" => 1,
            ],
            [
                "first_name" => "Mujeeb",
                "last_name" => "Adeoye",
                "email" => "mujhtech@gmail.com",
                "phone" => "2347063148208",
                "password" => "12345678",
                "verified" => 1,
                "role_id" => 1,
                "set_id" => 1,
            ],
            [
                "first_name" => "5thquadrant",
                "last_name" => "Limited",
                "email" => "5thquadrantlimited@gmail.com",
                "phone" => "2347033334444",
                "password" => "12345678",
                "verified" => 1,
                "role_id" => 3,
                "set_id" => 1,
            ],
        ];

        foreach ($datas as $data) {
            $existing = User::where('email', $data['email'])->get();
            if (!$existing->isEmpty()) {
                continue;
            }
            User::create($data);
        }

    }
}
