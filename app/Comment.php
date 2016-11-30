<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //允许使用create()和update()批量创建和更新的字段
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];  
}
