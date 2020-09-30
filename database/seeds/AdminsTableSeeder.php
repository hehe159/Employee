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
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        // create a new admin when seeding
        $admin = new Admin();
        $admin->name = 'Hoang Xuan Khanh';
        $admin->username = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('password');
        $admin->picture = 'no_image.png';
        $admin->save();
    }
}
