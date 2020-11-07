<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'superadmin',
                'slug' => 'superadmin',
                'last_modified_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'superadmin',
                'slug' => 'admin',
                'last_modified_at' => now(),
                'created_at' => now()
            ]

        ]);
    }
}
