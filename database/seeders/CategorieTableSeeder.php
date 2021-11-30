<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            ["name"=>"elctrominager","description"=>"caractérise tous les appareils","slug"=>"tous les appareils"],
            ["name"=>"vetements","description"=>"Un vêtement est une pièce de tissu","slug"=>"pièce de tissu"],
            ["name"=>"accessoire","description"=>"Qui accompagne une chose principale","slug"=>"accompagne une chose principale"],
            ["name"=>"Santé et beaut","description"=>"produits de santé et de beauté Soignez votre peau","slug"=>"cosmétiques"],


        ]);
    }
}
