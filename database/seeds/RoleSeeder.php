<?php

use App\role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Author']);
        Role::create(['name' => 'Subscriber']);
    }
}
