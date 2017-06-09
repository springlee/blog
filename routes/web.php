<?php

use  \Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('user/{name?}', function ($name = 121) {
//    return $name;
//});
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
})->middleware('check:test1,test121');


//Route::get('user/{name}', function ($name) {
//
//})->where('name', '[A-Za-z]+');


//Route::get('user1/{id}', function ($id) {
//    echo $url = route('test',['id'=>2]);
//})->name('test');


//子域名
//Route::group(['domain' => '{account}.blog.app'], function () {
//    Route::get('user/{id}', function (\Illuminate\Http\Request $request,$account, $id) {
//        //
//
//        var_dump($request->url(),Request::getRequestUri(),$account,$id);
//
//       // echo  $name = Route::currentRouteName();
//
//        //echo  $action = Route::currentRouteAction();
//    });
//});

//http://blog.app/api/users/6
Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
})->name('api.user');


Route::get('api/currentUser', function (\Illuminate\Http\Request $request) {

echo 1;

})->middleware('auth:api')->middleware('scope:place-orders'); //坑


Route::get('vue', function () {
    return view('vue');
});


Route::get('test/gate', function ( Request $request) {

    $post = \App\User::find(7);
    if (Gate::forUser($request->user())->allows('update-post', $post)) {
        echo  '123';
    }
    if (Gate::forUser($request->user())->denies('update-post', $post)) {
        echo  '456';
    }
    if (Gate::allows('update-post', $post)) {
        echo  '123';
    }
    if (Gate::denies('update-post', $post)) {
        echo  '456';
    }
});

Route::get('test/encrypt', function ( Request $request) {

    $arr = array('test'=>1,'test1'=>2);
    $str =  encrypt($arr);
    var_dump(decrypt($str));

    echo Crypt::encryptString('12');
});




Route::get('test/Artisan', function ( Request $request) {
    $exitCode = Artisan::call('email:send', [
        'user' => 1, '--queue' => 'default'
    ]);
    var_dump($exitCode);

//    $exitCode = Artisan::queue('email:send', [
//        'user' => 1, '--queue' => 'default'
//    ]);
//    var_dump($exitCode);

});




Route::get('test/broadcasting', function () {
    event(new \App\Events\ShippingStatusUpdated(123));

});




Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '3',
        'redirect_uri' => 'http://homestead.app/callback',
        'response_type' => 'code',
        'scope' => 'place-orders',
    ]);

    return redirect('http://blog.app/oauth/authorize?'.$query);

//    $query = http_build_query([
//        'client_id' => '9',
//        'redirect_uri' => 'http://homestead.app/callback',
//        'response_type' => 'token',
//        'scope' => 'place-orders check-status',
//    ]);
//
//    return redirect('http://blog.app/oauth/authorize?'.$query);
});






Route::get('/', function () {

    if (View::exists('emails.customer')) {
        //
//        echo 1;
    }else{
//        echo 2;
    }
    return view('welcome')->with('name', 'Victoria');

    //return view('welcome',['name' => 'James']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'],'/test/{user?}', 'HomeController@test')->name('test');

Route::match(['get', 'post'],'/testPost', 'HomeController@testPost')->name('testPost');

Route::match(['get', 'post'],'/ajaxTest', 'HomeController@ajaxTest')->name('ajax.test');
//prefix ==> 请求 admin/login  namespace=>相当于目录 Admin/LoginController
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout');
    $router->get('dash', 'DashboardController@index');
});

Route::resource('photos', 'PhotoController',['except' => [
    'index', 'show'
],'names' => [
    'create' => 'photo.build']]);

