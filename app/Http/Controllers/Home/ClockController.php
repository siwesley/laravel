<?php

namespace App\Http\Controllers\Home;

use App\model\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClockController extends Controller
{
    /**
     * @author zxy
     * @Date 2017/9/7
     * @return \Illuminate\Http\JsonResponse
     * 提交记录
     */
    public function create(Request $request)
    {
        $msg = new Record();
        $msg->weight = $request->weight;
        $msg->breakfast = (boolean)$request->breakfast;
        $msg->lunch = (boolean)$request->lunch;
        $msg->dinner = (boolean)$request->dinner;
        $msg->remarks = $request->remarks;
        $result = $msg->save();
        if ($result) {
            return response()->json(array('status' => 200, 'msg' => '提交成功'));
        } else {
            return response()->json(array('status' => 401, 'msg' => '提交失败'));
        }
    }
}
