<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p = new User;
        $p->name = "usuario1";
        $p->email = "usuario1@gmail.com";
        $p->is_admin = false;
        $p->password = bcrypt("pass1");
        $p->save();

        $p = new User;
        $p->name = "usuario2";
        $p->email = "usuario2@gmail.com";
        $p->is_admin = false;
        $p->password = bcrypt("pass2");
        $p->save();

        $p = new User;
        $p->name = "admin";
        $p->email = "admin@gmail.com";
        $p->is_admin = true;
        $p->password = bcrypt("admin");
        $p->save();
    }
}
