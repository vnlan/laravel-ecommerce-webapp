<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Order;
use App\Models\v1\Product;
use App\Models\v1\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AnalizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $order;
    private $user;
    private $products;
    public function __construct()
    {
        $this->order = new Order; 
        $this->user = new User;
        $this->products = new Product;
    }

    public function index()
    {
        
        $totalCustomers = $this->user->where('role_id', '>=', 5)->where('role_id', '<=', 6)->count();
        $notCheckOrders = $this->order->where('status', '=', 1)->count();
        $successOrders = $this->order->where('status', '=', 4)->count();
        $totalMoney = $this->order->where('status', '=', 4)->sum('total');

        $top5ExpensiveProducts = $this->products->orderBy('price','DESC')->take(5)->get();
        $top5NewCustomers = $this->user->where('role_id','>=', 5)->orderBy('created_at','desc')->take(5)->get();
        
       
        return view('v1.admin-views.pages.analize.index',compact('totalCustomers','notCheckOrders','successOrders','totalMoney','top5ExpensiveProducts','top5NewCustomers'));

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
