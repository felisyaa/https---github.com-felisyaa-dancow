<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->where('user_id', auth()->user()->id)->get();
        return view('dashboard.my_posts', [
            'title' => 'My Post',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Tambah Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        
        $data['excerpt'] = strip_tags(substr($data['body'], 0, 50));
        $data['user_id'] = auth()->user()->id;

        $test = Post::create($data);

        return redirect('/dashboard/posts')->with('PostBerhasil', 'Berhasil Membuat Post Baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required' 
        ];

        $rules['slug'] = (Request()->slug != $post->slug) ? 'required|unique:posts' : 'required';
        $data = Request()->validate($rules);

        $data['excerpt'] = Str::limit(strip_tags(Request()->body), 200);
        $data['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)->update($data);
        return redirect('/dashboard/posts')->with('editBerhasil', 'Edit Post Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('hapusBerhasil', 'Hapus Post Berhasil');
    }

    public function createSlug() {

        $slug = SlugService::createSlug(post::class, 'slug', Request()->title);
        return response()->json(['slug' => $slug]);
    }
}