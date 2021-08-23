<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['recent', 'feature', 'trending]'];

        foreach ($types as $type){
           Type::create([
                'name' => 'admin',
            ]);
        }

    }
}
