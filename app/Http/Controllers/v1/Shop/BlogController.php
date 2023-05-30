<?php

namespace App\Http\Controllers\v1\Shop;

use App\Http\Controllers\Controller;
use App\Models\v1\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $blog;

    public function __construct()
    {
        $this->blog = new Blog;
    
    }
    public function index()
    {
        //
        $blogs = $this->blog->paginate(4);
        $randomBlogs = $this->blog->inRandomOrder()->limit(4)->get();

  
        return view('v1.shop-views.pages.blogs.blogs', compact('blogs', 'randomBlogs'));
    }

    public function detail($id)
    {
        //
        $blog = $this->blog->find($id);
        $randomBlogs = $this->blog->inRandomOrder()->limit(4)->get();
        return view('v1.shop-views.pages.blogs.blog-detail', compact('blog', 'randomBlogs'));
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
        //
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
        //
    }


}
