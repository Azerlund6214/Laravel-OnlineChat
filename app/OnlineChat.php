<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineChat extends Model
{
    # Каким полям разрешено массовое заполнение  ($task->fill($request->all());)
    protected $fillable = ['author_nickname', 'message'];
    protected $table = 'online_chat';

    //
}
