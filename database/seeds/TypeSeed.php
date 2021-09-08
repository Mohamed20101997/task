<?php

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

    $types = ['recent', 'feature', 'trending'];

    foreach ($types as $type){
        \App\Models\Type::create([
            'name' => $type,
        ]);
    }

}

}
