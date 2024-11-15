<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(
            [
                [
                    'name' => 'free',
                    'description' => 'Free user account. Limited access.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'pro',
                    'description' => 'Pro user account. Full access.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
