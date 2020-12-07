<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//link the model file as per below
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pickup' => 'required',
            'dropoff' => 'required',
            'date' => 'required',
            'time' => 'required',
            'email' => 'required',
            'contact' => 'required'

        ]);

        //create post
        $post = Post::find($id);
        $post->pickup = $request->input('pickup');
        $post->dropoff = $request->input('dropoff');
        $post->date = $request->input('date');
        $post->time = $request->input('time');
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->contact = $request->input('contact');
        $post->roundtrip = $request->input('roundtrip');
        $post->save();

        //return redirect('posts/create');
        return redirect('/posts')->with('success', 'Trip Created');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pickup' => 'required',
            'dropoff' => 'required',
            'date' => 'required',
            'time' => 'required',
            'email' => 'required',
            'contact' => 'required'

        ]);

        //create post
        $post = new Post;
        $post->pickup = $request->input('pickup');
        $post->dropoff = $request->input('dropoff');
        $post->date = $request->input('date');
        $post->time = $request->input('time');
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->contact = $request->input('contact');
        $post->roundtrip = $request->input('roundtrip');
        $post->save();

        //return redirect('posts/create');
        return redirect('/posts')->with('success', 'Trip Edited');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Trip Deleted');
    }
}
