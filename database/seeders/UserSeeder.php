<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->name = "juan";
        $user->email = "juan@mail.com";
        $user->password = bcrypt("juan54321");
        $user->save();

        $user = new User();
        $user->name = "Carlos";
        $user->email = "carlos@mail.com";
        $user->password = bcrypt("carlos54321");
        $user->save();
        
    }
}
