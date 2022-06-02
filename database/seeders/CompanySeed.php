<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'id' => 1,
            'name' => 'Choperia Serrana Taboão',
            'description' => 'Chopp geladinho, várias opções de lanches, espetinhos e porções',
            'img' => 'public/assets/image/companies/choperia-serrana-taboao.jpg',
            'url' => 'choperia-serrana-taboao',
            'map' => 'https://www.google.com.br/maps/place/Choperia+Serrana+Tabo%C3%A3o/@-23.4269644,-46.5048308,17z/data=!3m1!4b1!4m5!3m4!1s0x94ce8b23974b93cd:0xbc21778f6f417ac2!8m2!3d-23.426919!4d-46.5026331',
            'created_at' => '2022/05/20 00:00:00',
            'updated_at' => '2022/05/20 00:00:00'
        ]);
    }
}
