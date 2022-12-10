<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Order;
use App\Models\v1\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $order;
    private $product;
    public function __construct()
    {
        $this->order = new Order;
        $this->product = new Product;
    }

    public function index()
    {
        //
        $orders =  $this->order->all();
        return view('v1.admin-views.pages.manage.orders.index', compact('orders'));
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
        try {
            $order =  $this->order->find($id);

            return view('v1.admin-views.pages.manage.orders.edit', compact('order'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
        }
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

        try {
            $orderOnUpdated =  $this->order->find($id);

            $orderMapping = [
                'status' => $request->status,
                'employee_id' => Auth::user()->id,
            ];


            if ($request->status == 4) {
                foreach ($orderOnUpdated->products as $product) {

                    $product->update(['stock' =>  $product->stock - $product->pivot->quantity]);
                }
            }


            $orderOnUpdated->update($orderMapping);

            return redirect()->route('orders.index')->with('success', 'Cập nhật đơn hàng thành công');
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('error', 'Cập nhật đơn hàng thất bại! Đã xảy ra lỗi');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny($id)
    {
        try {
            $orderOnDeny = $this->order->find($id);
            $orderOnDeny->update(['status' => 5]);
            return redirect()->back()->with('success', 'Hủy đơn hàng thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hủy đơn hàng thất bại! Đã xảy ra lỗi');
        }
    }
}
