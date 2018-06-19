<?php

namespace App\Http\Controllers\Admin;

use App\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MsgController extends Controller
{
    public function index()
    {
        $msg = new Messages();
        $list = $msg->orderBy('id', 'desc')->get();
        return response()->json(array('status' => 200, 'msg' => $list));
    }
}
