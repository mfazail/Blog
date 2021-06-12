<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('home.home', compact('posts'));
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
        // dd($request->all());
        $cover_photo = $request->file('cover_photo');
        $title = $request->input('title');
        $content = $request->input('content');
        $category = $request->input('category');
        $imageExt = $cover_photo->getClientOriginalExtension();
        $res = $cover_photo->storeAs('posts', $title . now()->timestamp . '.' . $imageExt);
        $url = 'storage/' . $res;
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($title),
            'title' => $title,
            'cover_photo' => $url,
            'category' => $category,
            'content' => $content
        ]);
        $res = $post->save();
        if ($res) {
            return redirect()->route('home');
        } else {
            return redirect()->route('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->get();
        return view('home.show', compact('post'));
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
        //
    }

    public function image(Request $request)
    {
        $image = $request->file('upload');
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExt = $image->getClientOriginalExtension();
        $res = $image->storeAs('uploads', $imageName . now()->timestamp . '.' . $imageExt);
        $url = 'storage/' . $res;
        return response()->json([
            'url' => $url
        ]);
    }

    public function search(Request $request)
    {
        $search = lcfirst($request->input('search'));
        $posts = Post::where('title', 'like', '%' . $search . '%')->orWhere('content', 'like', '%' . $search . '%')->with('user')->get();
        // return $posts . $search;

        return view('search', compact('posts'));
    }
}
