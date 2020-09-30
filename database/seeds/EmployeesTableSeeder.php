<?php

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
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

        $employee = new Employee();
        $employee->name = 'Lê Đình Thọ';
        $employee->email = 'thold@gmail.com';
        $employee->phone = '0935615988';
        $employee->address = 'Đà Nẵng';
        $employee->join_date = $dateNow;
        $employee->birth_date = $dateNow;
        $employee->dept_id = 1;
        $employee->gender_id = 1;
        $employee->age = 28;
        $employee->picture = 'no_image.jpg';
        $employee->save();
    }
}
