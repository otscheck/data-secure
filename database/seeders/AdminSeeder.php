<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['nom' => 'finance']);
        Role::create(['nom' => 'ressourcesHumaine']);
        Role::create(['nom' => 'operation']);
        Role::create(['nom' => 'chambreOps']);
        // $directeurRole = Role::create(['nom' => 'directeur']);
        // $adminRole = Role::create(['nom' => 'administrateur']);

        // User::create([
        //     'name' => 'Otscheck',
        //     'email' => 'admin@email.com',
        //     'password' => bcrypt('password'),
        //     'email_verified_at' => now(),
        //     'role_id' => $adminRole->id,
        // ]);
    }
}
