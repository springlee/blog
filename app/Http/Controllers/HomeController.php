<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {






        echo $value = $request->cookie('laravel_session');
        echo $request->old('name');
        $this->middleware('auth');
        session(['info' => array('test'=>1,'test2'=>1)]);
        $request->session()->put('key', 'value');

        $request->session()->push('user.teams', 'developers');
//         $value = $request->session()->pull('user', 'default');
        $request->session()->forget('user');

        //var_dump($value,$request->session()->all());
//        return response(view('home'))
//            ->header('Content-Type', 'text/html')
//            ->header('X-Header-One', 'Header Value')
//            ->header('X-Header-Two', 'Header Value');

//        return response(view('home'))
//            ->withHeaders([
//                'Content-Type' => 'text/html',
//                'X-Header-One' => 'Header Value',
//                'X-Header-Two' => 'Header Value',
//            ])->cookie('name', 'lichun', 10);

//        return response()->caps(view('home')); //
        return view('home');
    }


    public function test(Request $request,User $user)
    {

//        echo  $user->email.'<br>';
//
//        echo  $uri = $request->path().'<br>';
//
//        if ($request->is('test/*')) {
//            echo '123<br>';
//        }
//
//        echo $url = $request->url().'<br>';
//
//        echo $url = $request->fullUrl().'';

//        var_dump($input = $request->all());
//        $name = $request->input('data.name.0');
//        var_dump($name);
//        $input = $request->only(['username', 'password']);
//        var_dump($input);
//        $input = $request->intersect(['username', 'password']);
//        var_dump($input);

//        $name = $request->input('name');
//        var_dump($name);
//        $input = $request->only(['username', 'password']);
//        var_dump($input);
//        if ($request->has('name')) {
//            echo  'has';
//        }else{
//           echo 12;
//        }

//        return response('Hello World')->cookie(
//            'name', 'value'
//        );



        if ($request->isMethod('post')) {

//            $this->validate($request, [
//                'name' => 'required',
//                'photo' => 'required',
//            ]);

//            $file = $request->file('photo');
//
//
//            if ($request->hasFile('photo')) {
//                //
//                echo 1;
//
//            }else{
//                echo  2;
//            }
//            echo $path = $request->photo->path().'<br>';
//            echo  $extension = $request->photo->extension().'<br>';
//            echo  $path = $request->file('photo')->store('images');
//
//            echo $path = $request->photo->storeAs('images', 'filename.jpg');

//            var_dump($name = $request->input('name'));
            $request->flash();
//            return redirect('home')->withInput();


          //  return back()->withInput();

//            return redirect()->route('api.user',['id' => 1]);

//            return redirect()->route('api.user',User::find(6));
//            return redirect()->action('HomeController@index');

//            return response()
//                ->view('hello', $data, 200)
//                ->header('Content-Type', $type);
//            return response()->json([
//                'name' => 'Abigail',
//                'state' => 'CA'
//            ]);

            //jsonp
//            return response()
//                ->json(['name' => 'Abigail', 'state' => 'CA'])
//                ->withCallback($request->input('callback'));

           // return response()->download('/home/vagrant/Code/blog/storage/app/images/filename.jpg');
//            return response()->download('/home/vagrant/Code/blog/storage/app/images/filename.jpg','wenjian.jpg');
//            return response()->file('/home/vagrant/Code/blog/storage/app/images/filename.jpg');
        } else {
          //  echo $request->old('name');
            return view('test');
        }
    }
    
    public function testPost(Test $request){
        
    }

    public function ajaxTest(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'photo' => 'required',
        ]);
      
    }

}
