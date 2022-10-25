<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('UsuarioSeeder');

        DB::table('categorias')->insert([
            'id' => 1,
            'nombre_categoria' => 'Ordenador'          
        ]);

        DB::table('categorias')->insert([
            'id' => 2,
            'nombre_categoria' => 'Impresoras'          
        ]);

        DB::table('sub_categorias')->insert([
            'id' => 1,
            'nombre_sub_categoria' => 'Laptop' ,         
            'categoria_id' => 1          
        ]);

        DB::table('sub_categorias')->insert([
            'id' => 2,
            'nombre_sub_categoria' => 'Computadora' ,         
            'categoria_id' => 1          
        ]);


        DB::table('sub_categorias')->insert([
            'id' => 3,
            'nombre_sub_categoria' => 'Impresora Tinta' ,         
            'categoria_id' => 2          
        ]);

        DB::table('sub_categorias')->insert([
            'id' => 4,
            'nombre_sub_categoria' => 'Impresora Laser' ,         
            'categoria_id' => 2          
        ]);

        DB::table('sub_categorias')->insert([
            'id' => 5,
            'nombre_sub_categoria' => 'Impresora Matricial' ,         
            'categoria_id' => 2          
        ]);
    }
}
