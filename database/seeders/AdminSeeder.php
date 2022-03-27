<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->idnumber = '1800779';
        $admin->last_name = 'Uarymel';
        $admin->middle_name = '';
        $admin->first_name = 'Remetilla';
        $admin->email = 'uarymel@gmail.com';
        $admin->contact_number = '09303203009';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->attachRole('superadministrator');
    }
}
