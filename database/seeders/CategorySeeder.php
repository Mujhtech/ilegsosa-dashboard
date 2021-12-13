<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
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
                "name" => "Politics",
                "slug" => "politics",
            ],
            [
                "name" => "Sports",
                "slug" => "sports",
            ]
        ];

    	foreach ($datas as $data) {
    		$existing = Category::where('name', $data['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
            Category::create($data);
    	}
    }
}
