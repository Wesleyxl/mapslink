<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_settings')->insert([
            'id' => 1,
            'views' => 10,
            'phone' => '(11) 5199-3059',
            'cellphone' => '',
            'email' => 'contato@gmapslink.com.br',
            'office_hour' => '09:00 até 17:00',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => '',
            'copyright_year' => '',
            'about' => '',
            'short_about' => '',
            'created_at' => '2022/05/20 00:00:00',
            'updated_at' => '2022/05/20 00:00:00'
        ]);
    }
}
