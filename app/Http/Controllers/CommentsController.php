<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comments;

class CommentsController extends Controller
{

//    public function __construct()
//
//    {
//        $this->middleware('auth', ['only' => ['show']]); // посредник auth будет применен только для метода show
//    }

    public function show()
    {
        $comments=Comments::all();
        return view('admin.comments.show',['comments'=>$comments]);
    }

    public function save(Request $request, $id)
    {
        $this->validate($request, [
            'author' => 'required|max:100|min:5',
            'email' => 'required|email',
            'content'=>'required|min:5|max:400'
        ]);
        $all=$request->all();//Получаем все данные из формы в массив
        $all['article_id']=$id;//Добавляем в массив id статьи
        Comments::create($all);//Сохраняем в базу
        return back()->with('message','Спасибо за комментарий. После проверки он будет опубликован'); //редирект обратно к форме с сообщением
    }

    public function delete($id)
    {
        $comment=Comments::find($id);
        $comment->delete();
        return back();
    }

    public function published($id)
    {
        $comment=Comments::find($id);
        $comment->public=1;
        $comment->save();
        return back();
    }
}
