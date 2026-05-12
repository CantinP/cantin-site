<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cantin.fr'],
            [
                'name'     => 'Cantin',
                'password' => Hash::make('changeme!'),
                'role'     => 'admin',
            ]
        );
    }
}
