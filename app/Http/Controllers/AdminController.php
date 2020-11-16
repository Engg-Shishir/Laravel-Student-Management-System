<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Session;


class AdminController extends Controller
{
    public function loginview()
    {
        return view('adminlogin');
    }

    public function login(Request $request)
    {
        $admin = admin::where('username',$request->username)->where('password',$request->password)->get()->toArray();

        if($admin)
        {
            $request->session()->put('admin_session', $admin[0]['id']);

            return redirect('dashboard/');
        }else
        {
            return back()->with('error','Email & Password not match');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
