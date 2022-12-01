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
            'direccion' => 'calle 6 ',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario')

        ]);

        $admin = User::create([
            'name' => 'Usuario Administrador',
            'direccion' => 'calle 5 ',
            'email' => 'mary@gmail.com',
            'password' => Hash::make('alitas')

        ]);

        $usuario->roles()->attach($rolUsuario);
        $admin->roles()->attach($rolAdmin);



    }
}

