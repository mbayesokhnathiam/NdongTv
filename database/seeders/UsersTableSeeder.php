<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Lamine NDONG',
            'email' => 'lamine@ndongtv.com',
            'email_verified_at' => now(),
            'password' => Hash::make('P@sser12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
