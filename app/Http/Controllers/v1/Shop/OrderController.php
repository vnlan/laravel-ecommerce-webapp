<?php

namespace App\Http\Controllers\v1\Shop;

use App\Http\Controllers\Controller;
use App\Models\v1\Order;
use App\Models\v1\OrderDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $order;
    private  $orderDetail;
    public function __construct()
    {
        $this->order = new Order; 
        $this->orderDetail = new OrderDetail;
    }

    public function index()
    {
        //
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartSubtotal = Cart::subtotal();
        return view('v1.shop-views.pages.checkout',compact('carts','cartTotal','cartSubtotal'));
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
        try {
           
            $orderMapping = [
                
                'customer_id' => Auth::user()->id,
                'employee_id' => 0,
                'receiver_name' => $request->receiver_name,
                'receiver_phone' => $request->receiver_phone,
                'receiver_email' => $request->receiver_email,
                'receiver_address' => $request->receiver_address,
                'note' => $request->note,
                'total' => Cart::total(),
                'status' => 1,
            ];
            
            $orderCreated = $this->order->create($orderMapping);

            $carts = Cart::content();
            foreach ($carts as $cart ) {
                $data = [
                    'order_id' => $orderCreated->id,
                    'product_id' => $cart->id,
                    'quantity' => $cart->qty,
                    'price' => $cart->price,
                    'total' => $cart->price * $cart->qty,
    
                ];
                // $this->orderDetailNotRegistered->create($data);
                $this->orderDetail->create($data);
            }
            Cart::destroy();
            //4.Trả về kết quả
           
            return redirect()->route('shop.products.all')->with('success','Đặt hàng thành công! Bạn có thể xem lại lịch sử trong mục cá nhân');
            
          
          } catch (\Exception $e) {
          
              return redirect()->route('shop.products.index')->with('error','Đặt hàng thất bại đã xảy ra lỗi!');
     
        }
        
        
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
