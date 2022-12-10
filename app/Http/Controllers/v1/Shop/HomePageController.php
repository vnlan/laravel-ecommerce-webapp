<?php

namespace App\Http\Controllers\v1\Shop;

use App\Http\Controllers\Controller;
use App\Models\v1\Category;
use App\Models\v1\Product;
use App\Models\v1\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $product;
    private $category;
    private $slider;
    public function __construct()
    {
        $this->product = new Product; 
        $this->category = new Category;
        $this->slider = new Slider;
    }


    public function index()
    {
        //
        $newestProducts = $this->product->latest()->take(8)->get();
        $recommendedProducts = $this->product->where('is_recommended', '=', 1)->latest()->take(8)->get();
        $randomProducts = $this->product->inRandomOrder()->limit(8)->get();
        $newestCategories = $this->category->latest()->take(6)->get();
        $sliders = $this->slider->all();
        return view('v1.shop-views.home',compact('newestProducts','recommendedProducts','randomProducts','newestCategories','sliders'));
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
