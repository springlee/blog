<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades;

use App\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');



Artisan::command('test', function () {
    echo  'test';
})->describe('test');




Artisan::command('email:send {user*}  {--queue=}', function () {



    var_dump( $this->argument('user'));
    var_dump( $this->arguments());

    $this->call('test');

//    $user = User::find($user);
//    $view = 'vue';
//    $from = 'jslichun@sina.com';
//    $name = 'jslichun';
//    $to = $user->email;
//    $subject = "感谢注册 Sample 应用！请确认你的邮箱。";
//
//
//
//    Mail::send($view, compact('user'), function ($message) use ($from, $name, $to, $subject) {
//        $message->from($from, $name)->to($to)->subject($subject);
//    });
//   Mail::send();
})->describe('电子邮箱');