<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(GendersTableSeeder::class);
         $this->call(AdminsTableSeeder::class);
         $this->call(DepartmentsTableSeeder::class);
         $this->call(EmployeesTableSeeder::class);
    }
}
