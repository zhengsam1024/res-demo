<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

    	dump("出租房型類別 seeder ...");
    	$resTypes = config("base_res.types");
    	\App\Models\ResType::query()->firstOrCreate();



    }
}
