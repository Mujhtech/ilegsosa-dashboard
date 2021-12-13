<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
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
                "title" => "President",
            ],
            [
                "title" => "Vice President",
            ],
            [
                "title" => "Secreatary",
            ]
        ];

    	foreach ($datas as $data) {
    		$existing = Designation::where('title', $data['title'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            Designation::create($data);
    	}
    }
}
