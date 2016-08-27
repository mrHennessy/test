<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('admin.articles.articles',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all(); //выбираем все категории
        return view('admin.articles.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('preview')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date=date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
            if(!file_exists($root.$date))    {mkdir($root.$date);} // если папка с датой не существует, то создаем ее
            $f_name=$request->file('preview')->getClientOriginalName();//определяем имя файла
            $request->file('preview')->move($root.$date,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview']="/images/".$date."/".$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
            Article::create($all); //сохраняем массив в базу
        }
        else
        {
            Article::create($request->all()); // если картинка не передана, то сохраняем запрос, как есть.
        }
        return back()->with('message','Статья добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function edit($id)
    {
        $article=Article::find($id); //выбираем статью для редактирования
        $categories=Category::all(); // выбираем все категории
        return view('admin.articles.edit',['article'=>$article,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $article=Article::find($id);
        if($request->hasFile('preview')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date=date('d.m.Y'); //опеределяем текущую дату, она же будет именем каталога для картинок
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корневая папка для загрузки картинок
            if(!file_exists($root.$date))    {mkdir($root.$date);} // если папка с датой не существует, то создаем ее
            $f_name=$request->file('preview')->getClientOriginalName();//определяем имя файла
            $request->file('preview')->move($root.$date,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview']="/images/".$date."/".$f_name;// меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp
            $article->update($all);
        }
        else
        {
            $article->update($request->all());
        }
        return back()->with('message', 'Статья изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        $root=$_SERVER['DOCUMENT_ROOT'];
        if(!empty($article->preview))
        {
            unlink($root.$article->preview); //удаляем превьюшку
        }
        return back()->with('message','Статья удалена');
    }
}
