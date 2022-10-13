<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Rol;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolUsuario= Rol::Where('nombre', 'Usuario')->first();
        $rolAdmin= Rol::Where('nombre', 'Administrador')->first();

        $usuario = User::create([
            'name' => 'Usuario general',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario')

        ]);

        $admin = User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')

        ]);

        $usuario->roles()->attach($rolUsuario);
        $admin->roles()->attach($rolAdmin);



    }
}

