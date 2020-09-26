<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// DBクラスの定義場所
use Illuminate\Support\Facades\DB;


class UserEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_entry')->insert([
            'title' => "ダミータイトル2",
            'body' => "ダミー本文です2"
        ]);
    }
}

