<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a new admin when seeding
        $admin = new Admin();
        $admin->first_name = 'Hoang';
        $admin->last_name = 'Xuan Khanh';
        $admin->username = 'admin';
        $admin->email = 'khanh1509@gmail.com';
        $admin->password = bcrypt('password');
        $admin->picture = 'no_image.png';
        $admin->save();
    }
}
