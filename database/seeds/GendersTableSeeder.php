<?php

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender();
        $gender->gender_name = 'Nam';
        $gender->save();
        $gender = new Gender();
        $gender->gender_name = 'Nữ';
        $gender->save();
    }
}
