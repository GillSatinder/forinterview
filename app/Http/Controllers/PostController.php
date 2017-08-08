<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard()
    {

        //$posts = Post::all();
        $posts = Post::orderBy('created_at','desc')->get();

        return view('dashboard', compact('posts'));
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

           'body' => 'required | max:1000'

        ]);

        $post = new Post();
        $post->body = $request->body;
        $message = 'There is an error';
      if(  $request->user()->posts()->save($post))
      {
          $message = "Post sucessfully created !";
      };
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $post = Post::findOFail($id);

        // $post = Post::find($id)->first();
       $post = Post::where('id', $id) -> first();
       if(Auth::user() != $post->user)
       {
           return redirect()->back();
       }

        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Successfully deleted']);

       // $post = Post::find($id);

    }
}
