<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create(array('type'=>'administrator'));
        Role::create(array('type'=>'shipper'));
        Role::create(array('type'=>'carrier'));
        $admin = User::create(array(
           'name'=>'Jose Carlos',
            'lastname'=>'Castro',
            'companyName'=>'CommerzGroup',
            'phonenumber' => '5512121212',
            'city' => 'Mexico',
            'state' => 'Mexico',
            'email' => 'josecarlos@commerzgroup.com',
            'password' => bcrypt('chocolate')
        ));
        $admin->roles()->attach(1);

    }
}
