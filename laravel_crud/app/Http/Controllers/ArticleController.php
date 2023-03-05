<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ArticleController extends Controller
{
    function show()
    {
        // echo "HELLO_RAJ";

        // return view('list');

        // $articles = DB::table('articles')->orderBy('id','DESC')->get();

        $articles = Article::all();

        // echo"<pre>";
        // print_r($articles);
        // die;

        return view('list')->with(compact('articles'));
    }

    function addArticle()
    {
        // echo "HELLO_RAJ";

        return view('add');
    }

    function saveArticle(Request $request)
    {
        // echo "HELLO_RAJ";

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'desrciption' => 'required',
            'author' => 'required|max:100',
        ]);

        if ($validator->passes()) {

            //insert record

            // echo "Data_get";

            $article = new Article;
            $article->title = $request->title;
            $article->desrciption = $request->desrciption;
            $article->author = $request->author;
            $article->save();

            $request->session()->flash('msg', 'Article added successfully');
            return redirect('articles');
        } else {

            // return error

            return redirect('articles/add')->withErrors($validator)->withInput();
        }
    }

    function editArticle($id, Request $request)
    {
        // echo $id;

        $article = Article::where('id', $id)->first();

        if (!$article) {
            $request->session()->flash('errorMsg', 'Record not found.');

            return redirect('articles');
        }

        return view('edit')->with(compact('article'));
    }

    function updateArticle($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'desrciption' => 'required',
            'author' => 'required|max:100',
        ]);

        if ($validator->passes()) {

            $article = Article::find($id);
            $article->title = $request->title;
            $article->desrciption = $request->desrciption;
            $article->author = $request->author;
            $article->save();

            $request->session()->flash('msg', 'Article updated successfully');
            return redirect('articles');
        } else {

            // return error

            return redirect('articles/edit/' . $id)->withErrors($validator)->withInput();
        }
    }

    function deleteArticle($id, Request $request)
    {

        $article = Article::where('id', $id)->first();

        if (!$article) {
            $request->session()->flash('errorMsg', 'Record not found.');

            return redirect('articles');
        }

        Article::where('id', $id)->delete();

        $request->session()->flash('msg', 'Record Deleted.');

        return redirect('articles');

    }
}
