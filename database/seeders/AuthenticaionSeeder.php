<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthenticaionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set("Asia/Karachi");
        User::create([
            "first_name" => 'Sheharyar',
            "last_name" => 'Ahmed',
            "email" => 'admin@gmail.com',
            "dob" => '1/11/2002',
            "contact_number" => '+923127502394',
            "password" => Hash::make(123123123),
            "country" => 'Pakistan',
            "state" => 'Punjab',
            "city" => 'Faisalabad',
            "zip_code" => 3800,
            "email_verified_at" => date('Y-m-d h:i:s A'),
            "is_email_verified" => 1,
            "added_from" => 1,
            "role" => 1,
            "status" => 1,
        ]);
    }
}
