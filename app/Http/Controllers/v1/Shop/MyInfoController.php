<?php

namespace App\Http\Controllers\v1\Shop;

use App\Http\Controllers\Controller;
use App\Models\v1\Order;
use App\Models\v1\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\v1\StorageFileTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MyInfoController extends Controller
{
    //
    use StorageFileTrait;
    private $order;
    private $user;
    public function __construct()
    {
        $this->order = new Order; 
        $this->user = new User;
    }

    public function index()
    {
        
        $myOrders = Auth::user()->customerOrders;
       
         return view('v1.shop-views.pages.my-info',compact('myOrders'));
    }

    public function updateOrder(Request $request, $id)
    {
        try {
            $orderOnUpdated = $this->order->find($id);
            
            $orderMapping = [
                'receiver_name' => $request->receiver_name,
                'receiver_phone' => $request->receiver_phone,
                'receiver_email' => $request->receiver_email,
                'receiver_address' => $request->receiver_address,
                'note' => $request->note,
            ];

            $orderOnUpdated->update($orderMapping);
            return redirect()->route('shop.my-info.index')->with('success','Cập nhật thông tin người nhận thành công!');

        } catch (\Exception $e) {
            return redirect()->route('shop.my-info.index')->with('error','Cập nhật thất bại! Đã xảy ra lỗi');
        }
      
    }


    public function updateInfo(Request $request, $id)
    {
        try {
            $userOnUpdated = $this->user->find($id);
            
            $userMapping = [
                'display_name' => $request->display_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'salary' => 0,
            ];
            
            $avatarImageUploaded = $this->storageFileUpload($request, 'avatar_path', 'v1/admin-page/images/customers/' . Str::Slug($request->display_name) . '/avatar');
            if (!empty($avatarImageUploaded)) {
                $userMapping['avatar_path'] = $avatarImageUploaded['file_path'];
                
            }
            $userOnUpdated->update($userMapping);
            return redirect()->route('shop.my-info.index')->with('success','Cập nhật thông tin cá nhân thành công!');

        } catch (\Exception $e) {
            return redirect()->route('shop.my-info.index')->with('error','Cập nhật thất bại! Đã xảy ra lỗi');
        }
      
    }
}
