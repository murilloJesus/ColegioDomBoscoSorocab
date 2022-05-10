<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return News::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create($request->post());

        if($news){
            $this->saveJSON();
            return $news;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return News::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::where('id', $id)
                    ->update($request->post());

        if($news){
            $this->saveJSON();
            return $news;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::where('id', $id)->delete();

        if($news){
            $this->saveJSON();
            return $news;
        }
    }


    public function home(Request $request)
    {
        if($request->get('pesquisa')){
            $pesquisa = $request->get('pesquisa');

            $encontrados = News::where('title', 'LIKE', '%'.$pesquisa.'%')
                                    ->orWhere('subtitle', 'LIKE', '%'.$pesquisa.'%')
                                    ->orWhere('content', 'LIKE', '%'.$pesquisa.'%')->get();

            return view('pages.noticias.lista', ['noticias' => $encontrados, 'search' => ["PESQUISA", $pesquisa] ]);

        }else if($request->get('categoria')){
            $categoria = $request->get('categoria');

            return view('pages.noticias.lista', ['noticias' => News::where('categories', $categoria)->get(), 'search' => ["CATEGORIA", $categoria] ]);
        }else{
            return view('pages.noticias.index', ['noticias' => News::orderBy('created_at')->get()]);
        }
    }


    /**
     * Upload Image for api editing news
     *
     * @param  \Request $request
     * @return string
     */
    public function upload(Request $request){

        $file = $request->file->store('images/noticias');
        return $file;

    }

            /**
     * saveJSON
     *
     * @return void
     */
    public function saveJSON()
    {
       $banners = News::where("status", 1)->get();
       $json = Collection::make($banners)
                    ->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return Storage::put('data/news.json', $json);
    }
}
