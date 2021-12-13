<?php

namespace Database\Seeders;

use App\Models\Set;
use Illuminate\Database\Seeder;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                "name" => "2019/2020 Set",
                "status" => true,
            ],
            [
                "name" => "2018/2019 Set",
                "status" => true,
            ],
            [
                "name" => "2017/2018 Set",
                "status" => true,
            ],
        ];

        foreach ($roles as $role) {
            $existing = Set::where('name', $role['name'])->get();
            if (!$existing->isEmpty()) {
                continue;
            }
            Set::create($role);
        }
    }
}
