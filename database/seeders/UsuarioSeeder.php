<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'eduar',
            'email' => 'eduar@gmail.com',
            'password' => Hash::make('eduar'),
            'url' => 'http://127.0.0.1:8000',

        ]);
        // $user->perfil()->create();

        $user2 = User::create([
            'name' => 'pablo',
            'email' => 'pablo@gmail.com',
            'password' => Hash::make('pablo'),
            'url' => 'http://127.0.0.1:8000',

        ]);
        // $user2->perfil()->create();
    }
}
