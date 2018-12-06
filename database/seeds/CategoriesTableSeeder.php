<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json/tags.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            \App\Category::create([
                'name' => $obj->name,
            ]);
        }
    }
}
