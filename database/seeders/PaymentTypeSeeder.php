<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
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
                "name" => "Membership Due",
            ],
            [
                "name" => "Donation",
            ]
        ];

    	foreach ($datas as $data) {
    		$existing = PaymentType::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            PaymentType::create($data);
    	}
    }
}
