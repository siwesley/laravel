<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //是否已登录
        if(Auth::guard('admin')->check()){
            return redirect('bbb');
        }
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     * 创建用户
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin();
        $admin->username = 'zxy';
        $admin->password = bcrypt('123456');
        $admin->save();
    }

    /**
     * Store a newly created resource in storage.
     * 登录验证
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('admin')->attempt(['username' => 'zxy', 'password' => $request->password])) {
            return redirect('/bbb');
        } else {
            return redirect()->back()->withErrors('密码不正确')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @author zxy
     * @Date 2017/8/2
     * 退出登录
     */
    protected function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin_login');
    }
}
