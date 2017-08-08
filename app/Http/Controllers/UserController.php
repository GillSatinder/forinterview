<?php

namespace App\Http\Controllers;
use App\User;
use Faker\Provider\File;
//use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Response;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Filel;

class UserController extends Controller
{

    public function postSignUp(Request $request)   // this is dependency injection
    {


        $this->validate($request,[

            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        $user = new User();

        $user->first_name = $request['first_name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');

        //return $user;




    }
    public function postSignIn(Request $request)
    {

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            return redirect() -> route('dashboard');
        }
        else{
            return redirect() -> back();
        }

    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect() -> route('home');
    }
    public function getAccount()
    {
        $user = Auth::user();
        return view ('account',compact('user'));
    }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request , [

            'first_name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();

        $file = $request->file('image');

        $filename = $request['first_name'] . '-' . $user->id . '.jpg';



        if($file)
        {
            Storage::disk('local')->put($file, $filename);
        }
        return redirect()->route('account');
    }


    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);

       // return $file;


        return new Response($file,200);
    }

}
