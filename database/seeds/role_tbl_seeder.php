<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class role_tbl_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_roles')->insert([
            'name' => 'admin',
            'link' => '/admin',
            'desc' => 'administrator system',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_roles')->insert([
            'name' => 'writer',
            'link' => '/writer',
            'desc' => 'content writer',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_roles')->insert([
            'name' => 'user',
            'link' => '/user',
            'desc' => 'user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);                
    }
}
