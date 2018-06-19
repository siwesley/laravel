<?php
/**
 * Created by PhpStorm.
 * File: WechatController.php
 * User: zxy
 * Date: 2017/7/5
 * Time: 16:07
 */

namespace App\Http\Controllers;

use App\Messages;
use App\model\Img;
use App\model\Movie;
use App\models\Area;
use EasyWeChat\Message\Text;
use Illuminate\Support\Facades\Log;
use \Curl\Curl;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Image;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Storage;
use App\Services\OSS;
use Illuminate\Support\Facades\DB;
use App\model\Describe;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;

class WechatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $wechat = app('wechat.official_account');

        $wechat->server->push(function ($message) {
            //Log::info($message);
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
return 'nihao';
break;
                    Log::info($message);
                    if ($message['Content'] == '陆珍') {
                        return 'https://luzhen.zhangxiaoyao.cn/love';
                    }
			
		    $items = [
    new NewsItem([
        'title'       => '测试',
        'description' => '不要忘记分析',
        'url'         => 'http://dy.zhangxiaoyao.cn',
        'image'       => 'http://dy.zhangxiaoyao.cn/images/sologo.png',
        // ...
    ]),
    // ...
];
$news = new News($items);
return $news;
//                    //图灵机器人
//                    $curl = new Curl();
//                    $result = $curl->post('http://www.tuling123.com/openapi/api', array('key' => 'aae2696cd2864f0da00cf6c20881b1f0', 'info' => $message['Content']));
//                    //存数据库
//                    $msg_model = new Messages();
//                    $msg_model->openid = $message['FromUserName'];
//                    $msg_model->content = $message['Content'];
//
//                    $msg_model->message = $result->text;
//                    $msg_model->save();
//
//                    return $result->text;

                    //匹配数据库 电影资源
             /**       $list = DB::table('80s')->where('name', 'like', '%' . $message['Content'] . '%')->limit(5)->get();
                    if (count($list) > 1) {
                        $item = "请精确查询:\n";
                        foreach ($list as $l) {
                            $item .= $l->name . "\n";
                        }
                        return $item;
                    }
                    $movie = DB::table('80s')->where('name', 'like', '%' . $message['Content'] . '%')->first();
                    return $movie->name . "\n" . $movie->tv_download_link;

*/
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
            // ...
        });


        return $wechat->server->serve();
    }

    public function ggg($w = 1, $n = 1)
    {
        $appcode = "68da5147ddfe4f94a6820f95e9377ee0";
        $curl = new Curl();
        $curl->setHeader('Authorization', 'APPCODE ' . $appcode);
        $a = $curl->get("http://ali-city.showapi.com/areaName", array('level' => $w, 'maxSize' => 20, 'page' => $n));
        foreach ($a->showapi_res_body->data as $v) {
            $item = new Area();
            $item->provinceId = $v->provinceId;
            if (!empty($v->simpleName)) {
                $item->simpleName = $v->simpleName;
            }

            $item->lon = $v->lon;
            $item->areaCode = $v->areaCode;
            $item->cityId = $v->cityId;
            $item->b_id = $v->id;
            $item->remark = $v->remark;
            $item->prePinYin = $v->prePinYin;
            $item->pinYin = $v->pinYin;
            $item->parentId = $v->parentId;
            $item->level = $v->level;
            $item->areaName = $v->areaName;
            $item->simplePy = $v->simplePy;
            $item->zipCode = $v->zipCode;
            $item->countyId = $v->countyId;
            $item->lat = $v->lat;
            $item->wholeName = $v->wholeName;
            $item->save();
        }
    }

    public function test()
    {
        $disk = Storage::disk('qiniu');

// create a file
        $a = $disk->put('test.jpg',file_get_contents('D:\web\zxy\blog\public\img\1.jpg'));
        dd($a);

// check if a file exists
        $exists = $disk->has('file.jpg');

// get timestamp
        $time = $disk->lastModified('file1.jpg');
        $time = $disk->getTimestamp('file1.jpg');

// copy a file
        $disk->copy('old/file1.jpg', 'new/file1.jpg');

// move a file
        $disk->move('old/file1.jpg', 'new/file1.jpg');

// get file contents
        $contents = $disk->read('folder/my_file.txt');

// fetch url content
        $file = $disk->fetch('folder/save_as.txt', $fromUrl);

// get file url
        $url = $disk->getUrl('folder/my_file.txt');

// get file upload token
        $token = $disk->getUploadToken('folder/my_file.txt');
        $token = $disk->getUploadToken('folder/my_file.txt', 3600);

// get private url
        $url = $disk->privateDownloadUrl('folder/my_file.txt');




        dd('ok');
//        $dir = "D:/web/img/";
//
//        $a = scandir($dir);
//        foreach($a as $v){
//            if($v != '.' && $v != '..'){
//                $b = scandir('D:/web/img/'.$v);
//                //上传七牛
//                foreach($b as $s){
//                    if($v != '.' && $v != '..'){
//
//                    }
//                }
//            }
//        }
//        dd($a);
        set_time_limit(0);
        $dir = "E:/mzitu/";
        $a = scandir($dir);
        foreach ($a as $v) {
            if ($v != '.' && $v != '..') {
                $dir_name = iconv('gbk', 'utf-8', $v);
                $b = scandir('E:/mzitu/' . $v);
                //重复数据不处理
                $result = Describe::where('describe', $dir_name)->get();
                if (!$result->isEmpty()) {
                    continue;
                }
                //存入数据库
                $describe = new Describe();
                $describe->describe = $dir_name;
                $describe->save();
                //上传七牛
                foreach ($b as $s) {
                    if ($s != '.' && $s != '..') {
                        $filename = uniqid(time());
                        OSS::publicUpload('siwesley0420', $filename . '.jpg', $dir . $v . '/' . $s, [
                            'Endpoint' => 'http://oss-cn-beijing.aliyuncs.com',
                        ]);
                        $img = new Img();
                        $img->img_url = $filename . '.jpg';
                        $img->describe_id = $describe->id;
                        $img->save();
                    }
                }
            }
        }

    }

    //首页数据
    public function imgList()
    {
        $list = Describe::orderBy('id', 'desc')->paginate(6);
        foreach ($list as &$v) {
            $v->imgs = Img::where('describe_id', $v['id'])->limit(6)->get();
//            foreach ($v->imgs as &$v){
//                $v = $this->PrivateKeyA($v->img_url);
//            }
        }
        return response()->json(['data' => $list]);
    }

    //详情页数据
    public function imgInfo($id)
    {
        $data = Describe::find($id);
        return view('img.mzitu', ['data' => $data]);
    }

    //详情页图片
    public function getImg($id)
    {
        $data = Img::where('describe_id', $id)->paginate(6);
        return response()->json(['data' => $data]);
    }

    //cdn鉴权设置
    public function PrivateKeyA($name)
    {
        $time = strtotime("+8 hours");
        $key = "siwesley";
        $domain = "http://image.zhangxiaoyao.cn/";
        $filename = $name;
        $sstring = $filename . "-" . $time . "-0-0-" . $key;
        $md5 = md5($sstring);
        $auth_key = "auth_key=" . $time . "-0-0-" . $md5;
        $url = $domain . $filename . "?" . $auth_key;
        return $url;
    }
}
