<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Json;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Banner::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner =  Banner::create($request->post());

        if($banner){
            $this->saveJSON();
            return $banner;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return $banner;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::where('id', $id)
        ->update($request->post());

        if($banner){
            $this->saveJSON();
            return $banner;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::where('id', $id)->delete();

        if($banner){
            $this->saveJSON();
            return $banner;
        }
    }


    /**
     * Upload Image for api editing banner
     *
     * @param  \Request $request
     * @return string
     */
    public function upload(Request $request){

        $file = $request->file->store('images/banners');

        return $file;
    }

        /**
     * saveJSON
     *
     * @return void
     */
    public function saveJSON()
    {
       $banners = Banner::where("status", 1)->get();
       $json = Collection::make($banners)
                    ->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return Storage::put('data/banners.json', $json);
    }

    /**
     * getFromJSON
     *
     * @return array
     */
    static function getFromJSON()
    {


        return Json::decode( Storage::exists("/data/banners.json") ? Storage::get("/data/banners.json") : '[]' );
    }
}
