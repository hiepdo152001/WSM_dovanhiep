<?php

namespace Database\Seeders;

use App\Models\department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        department::insert([
            'name' => 'd1',
        ]);
        department::insert([
            'name' => 'd2',
            ]);
        department::insert([
            'name' => 'd3',
                ]);
    }
}
