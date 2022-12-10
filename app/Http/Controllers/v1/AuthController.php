<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    private $user;

    public function __construct()
    {

        $this->user = new User;
    }

    public function index()
    {
        return view('v1.admin-views.pages.auth.login');
    }



    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required|min:6',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email không được để trống',
            'email.min' => 'Email chứa tối thiểu :min ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu chứa tối thiểu :min ký tự'
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            /* 'role' => 1 */
        ])) {
            return redirect()->route('admin.welcome');
        } else {
            session()->flash('error', 'Email hoặc mật khẩu không chính xác');
            return redirect()->route('admin.auth.index');
        }
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('admin.auth.index');
    }

    public function welcome()
    {
        return view('v1.admin-views.pages.welcome');
    }


    public function shopLogin(Request $request)
    {


        $request->validate([
            'email' => 'required|min:6',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email không được để trống',
            'email.min' => 'Email chứa tối thiểu :min ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu chứa tối thiểu :min ký tự'
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            /* 'role' => 1 */
        ])) {
            return redirect()->back()->with('success', 'Đăng nhập thành công');
        } else {

            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
        }
    }
    public function shopLogout()
    {

        Auth::logout();

        return redirect('/')->with('success', 'Đã đăng xuất thành công!');
    }
    public function shopRegister(Request $request)
    {
        try {

            $userMapping = [
                'display_name' => $request->display_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => $request->password,

                'active' => 1,
                'address' => $request->address,
                'phone' => $request->phone,
                'role_id' => 6,
                'salary' => 0,
            ];



            $userCreated = $this->user->create($userMapping);

            return redirect('/')->with('success', 'Đã đăng kí tài khoản thành công! Giờ bạn có thể đăng nhập');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Đăng kí thất bại do trùng email!');
        }
    }
}
