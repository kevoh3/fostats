<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use photos;
use Session;

use Image;
use DB;
use Mews\Purifier\Facades\Purifier;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function getSingle($slug){

        $article=Article::where('slug','=',$slug)->first();
        return view('news.single')
            ->withArticle($article);

    }
    public function index()
    {
        $article=DB::table('articles')->orderBy('article_id','desc')->paginate(10);
        return view("news.index")
            ->with('Article' ,$article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            "title" => "required",
            "slug" => "required|alpha_dash",
            "body" => "required",
            "tags"=>"required",
            "author"=>"required",
        ));
        $article=new Article;
        $article->title=$request->title;
        $article->slug=$request->slug;
        $article->body=purifier::clean($request->body);
        $article->tags=$request->tags;
        $article->author=$request->author;
         if($request->hasFile('image')){
             $image = $request ->file('image');
             $filename=time().'.'.$image->getClientOriginalExtension();
             $location=public_path('photo/article/'.$filename);
             image::make($image->getRealPath())->resize(900,500)->save($location);
             $article->image=$filename;
         }
        $article->save();
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("news.show", $article->article_id);
    }

    /**File::exists
     * return redirect()->route("matche.show", $matche->match_id);
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {

        $article=Article::find($article_id);
        return view('news.show')
        ->with('Article' ,$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
    return view('matche.show')
    ->with('matche' ,$matche);
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id)
    {
        $article =Article::find($article_id);
        return view('news.edit')
            ->with('Article' ,$article);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id)
    {
        $article =Article::find($article_id);
        if ($request->input('slug')==$article->slug){
            $this->validate($request, array(
                "title" => "required",
                "body" => "required",
                "tags"=>"required",
                "author"=>"required",
            ));
        }
        else{
        $this->validate($request, array(
            "title" => "required",
            "slug" => "required|alpha_dash|min:5|max:255|unique:Articles,slug",
            "body" => "required",
            "tags"=>"required",
            "author"=>"required",
        ));
        }

        $article =Article::find($article_id);
        $article->title=$request->title;
        $article->slug=$request->slug;
        $article->body=purifier::clean($request->body);
        $article->tags=$request->tags;
        $article->author=$request->author;
        if($request->hasFile('image')){
            $image = $request ->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('photo/article/'.$filename);
            image::make($image->getRealPath())->resize(900,500)->save($location);
            $article->image=$filename;
        }
        $article->save();
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("news.show", $article->article_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id)
    {
        //
    }
}
