<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
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
            \App\Tag::create([
               'name' => $obj->name,
            ]);
        }
    }
}
