<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\OnlineChat; #Модель
use Illuminate\Foundation\Validation\ValidatesRequests; # Трейт для валидации

class ChatController extends Controller
{
    //
    use ValidatesRequests; # Трейт для валидации

    public $admin_token = "token1234321token"; # токен что бы удалять мог только админ
    public $admin_pass = "123pass"; # Пароль админа: 123.com/chat/admin/этот пароль


    public function index($admin_pass="")
    {

        #$all_messages = OnlineChat::all();
        $all_messages = OnlineChat::orderBy('id', 'desc')
                                    ->take(50)
                                    ->get();

        if( $admin_pass === $this->admin_pass)
            return view('alone-project-chat.index', ['all_messages'=>$all_messages, 'admin_token'=>$this->admin_token]);

        return view('alone-project-chat.index', ['all_messages'=>$all_messages, 'admin_token'=>false]); # Без false ошибка
    }


    public function addmsg(Request $request)
    {

        $this->validate($request, [
                'author_nickname'=>'required|max:10',
                'message'=>'required|max:255',
            ]
        );

        $task = new OnlineChat;
        $task->fill($request->all()); # Заполнение через $fillable
        #$task->author_nickname = $request->get('title');   # Заполнение поштучно

        $task->save();

        //$author = $task->getAttribute('author_nickname');
        //return view('alone-project-chat.index', ['author'=>$author]);

        //dd($task);

        return redirect()->route('chat.index');

    }

    public function delete($id , $admin_token)
    {
        if( $admin_token != $this->admin_token )
            return redirect()->route('chat.index');


        OnlineChat::find($id)->delete();

        return redirect()->route('chat.indexAdmin',['pass'=>$this->admin_pass]);

    }
}
