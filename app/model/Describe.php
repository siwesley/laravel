<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/5/2
 * Time: 20:42
 */
namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Describe extends Model
{
    //
    public function imgs()
    {
        return $this->hasMany('App\model\Img', 'describe_id', 'id');
    }
}