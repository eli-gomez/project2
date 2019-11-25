<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //rol 1= gerente 2= empleado 3=cliente
      $user = new User;
      $user->name  =  'Gerente';
      $user->email  =  'gerente@eventos.com';
      $user->email_verified_at  =  now();
      $user->password = bcrypt('gerente123');
      $user->rol = 1;
      $user->save();

      $user = new User;
      $user->name  =  'Empleado';
      $user->email  =  'empleado@eventos.com';
      $user->email_verified_at  =  now();
      $user->password = bcrypt('empleado123');
      $user->rol = 1;
      $user->save();

    }
}
