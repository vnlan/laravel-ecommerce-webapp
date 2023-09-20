<?php

namespace App\Http\Controllers\v1\Shop;

use App\Http\Controllers\Controller;
use App\Models\v1\Category;
use App\Models\v1\Product;
use App\Models\v1\ProductCompany;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $product;
    private $productCompany;
    private $category;
    public function __construct()
    {
        $this->product = new Product;
        $this->productCompany = new ProductCompany;
        $this->category = new Category;
    }
    public function index()
    {
        //
        $brands = $this->productCompany->all();
        $products = $this->product->paginate(9);
        $categories = $this->category->all();
        $minPrice = $this->product->whereNotNull('price')->min("price");
        $maxPrice = $this->product->whereNotNull('price')->max("price");
        return view('v1.shop-views.pages.products', compact('products', 'brands', 'categories','minPrice','maxPrice'));
    }

    public function detail($id)
    {
        //
        $randomProducts = $this->product->inRandomOrder()->limit(5)->get();
        $product = $this->product->find($id);

        return view('v1.shop-views.pages.product-detail', compact('product','randomProducts'));
    }

    public function filterByCategory($id)
    {
        try {
            $categoryRequested = $this->category->find($id);
            $products = $categoryRequested->products()->paginate(9);
            $brands = $this->productCompany->all();
            $categories = $this->category->all();
            $minPrice = $this->product->whereNotNull('price')->min("price");
            $maxPrice = $this->product->whereNotNull('price')->max("price");
            return view('v1.shop-views.pages.products', compact('products', 'brands', 'categories','minPrice','maxPrice'));
        } catch (\Throwable $th) {
            return redirect()->route('shop.index')->with('error','Không tồn tại danh mục! Mời quý khách chọn danh mục khác');
        }
      
        // dd($products);
    }
    public function filterByBrand($id)
    {
        try {
            $productCompanyRequested = $this->productCompany->find($id);
            $products = $productCompanyRequested->products()->paginate(9);

            $brands = $this->productCompany->all();
            $categories = $this->category->all();
            $minPrice = $this->product->whereNotNull('price')->min("price");
            $maxPrice = $this->product->whereNotNull('price')->max("price");
            return view('v1.shop-views.pages.products', compact('products', 'brands', 'categories','minPrice','maxPrice'));
        } catch (\Throwable $th) {
            return redirect()->route('shop.index')->with('error','Không tồn tại hãng! Mời quý khách chọn hãng khác');
        }
      
        // dd($products);
    }
    public function filterByMultiple(Request $request)
    {
        try {
        $query = Product::query();

        if ($request->filled('min_price') && $request->filled('max_price')) {
            // list($min, $max) = explode(",", $request->price);

            $query->where('price', '>=', $request->min_price)
                  ->where('price', '<=', $request->max_price);
        }

        if ($request->filled('product_company')) {
            $product_company_id = $request->product_company;

            $query->whereHas('companies', function ($query) use ($product_company_id) {
                $query->where('product_company_id', $product_company_id);
            });
           
        }

    
        if ($request->filled('category')) {
            $category_id = $request->category;

            $query->whereHas('categories', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
           
        }

            $products =  $query->paginate(9);
            $brands = $this->productCompany->all();
            $categories = $this->category->all();
            $minPrice = $this->product->whereNotNull('price')->min("price");
            $maxPrice = $this->product->whereNotNull('price')->max("price");
            return view('v1.shop-views.pages.products', compact('products', 'brands', 'categories','minPrice','maxPrice'));
        // dd($products);
        } catch (\Throwable $th) {
            return redirect()->route('shop.products.all')->with('error','Không tồn tại sản phẩm khớp!');
        }
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

    public function searchByName(Request $request)
    {
        //
        // $productsMatch = $this->product->where('name', 'LIKE', '%'.$request->keyword.'%')->take(5)->get();
        //    return view('v1.shop-views.partials.header',compact('productsMatch'));

        if ($request->ajax()) {
            $output = '';
            $products = $this->product->where('name', 'LIKE', '%' . $request->keyword . '%')->take(3)->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<div class="header-search-wrapper search-wrapper-wide">
                    <div class="row my-2">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/products/detail/'. $product->id.'"><h6>'.$product->name.'</h6></a>'
                        .'</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>'. $product->price .' đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 my-1" 
                            <a href="/products/detail/'. $product->id . '">
                                <img width="auto" height="200" src="'. $product->feature_image_path 
                            .'"></a>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>';
                }
            }
            return Response($output);
        }
    }
}
