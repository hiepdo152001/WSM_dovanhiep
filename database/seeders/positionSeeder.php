<?php

namespace Database\Seeders;

use App\Models\position;
use Illuminate\Database\Seeder;

class positionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        position::insert( [
            'name' => 'root',
        ]);
        position::insert( [
            'name' => 'manager',
          ]);
          position::insert( [
            'name' => 'user',
          ]);

    }
}
