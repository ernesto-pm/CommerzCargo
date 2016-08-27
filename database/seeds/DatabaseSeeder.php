<?php

use Illuminate\Database\Seeder;
use App\Role;

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
    }
}
