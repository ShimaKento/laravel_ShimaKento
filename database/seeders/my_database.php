<?php

namespace Database\Seeders;

use DateTime as GlobalDateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use Illuminate\Support\Str; //追加
use Illuminate\Support\Facades\Hash; //追加
//use Faker\Provider\DateTime; // 追加

class my_database extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //usersテーブル　ダミー
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email'     => Str::random(10).'@gmail.com',
            'password'  => Hash::make('password'),
        ]); 
        /*
        //usersテーブル　指定（今のとこ失敗）
        DB::table('users')->insert([
            'id' => 2,
            'name' => '名無し',
            'email'     => 'nameless@gmail.com',
            'password'  => Hash::make('nanashi'),
        ]);
        
        //postsテーブル　ダミー
        DB::table('posts')->insert([
            'post' => Str::random(10),
            'user_id'     => 3,
            'post_time'  => GlobalDateTime::dateTimeThisDecade(),
        ]); 
        //replysテーブル　ダミー
        DB::table('replys')->insert([
            'reply' => Str::random(10),
            'post_id'     => Str::random(10).'@gmail.com',
            'hierarchy'  => 1,
            'reply_time'  => GlobalDateTime::dateTimeThisDecade(),
        ]); */
    }
}
