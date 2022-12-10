<?php

namespace App\Http\Controllers\v1\shop;

use App\Http\Controllers\Controller;
use App\Models\v1\Category;
use App\Models\v1\Product;
use App\Models\v1\ProductCompany;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
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
        $carts = Cart::content();
        $cartTotal = Cart::total() ;
        $cartSubtotal = Cart::subtotal();
        return view('v1.shop-views.pages.cart', compact('carts', 'cartTotal', 'cartSubtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addOne($id)
    {
        try{
            $product = $this->product->findOrFail($id);

            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 0,
                'options' => [
                    'feature_image' => $product->feature_image_path,
                ]
            ]);
            return back()->with('success','Thêm vào giỏ hàng thành công!');
          
        }catch(\Exception $e){
            return back()->with('error','Thêm vào giỏ hàng thất bại! Đã xảy ra lỗi');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
    public function delete($rowId)
    {

        try {
            //code...
            Cart::remove($rowId);
            return back()->with('success', 'Xóa thành công!');
        } catch (\Exception $ex) {
            return back()->with('error', 'Xóa thất bại! Đã xảy ra lỗi!');
        }
     
    }

}
