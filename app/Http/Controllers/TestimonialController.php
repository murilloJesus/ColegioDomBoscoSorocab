<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Testimonial::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = Testimonial::create($request->post());

        if($testimonial){
            $this->saveJSON();
            return $testimonial;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Testimonial::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonial =  Testimonial::where('id', $id)
                ->update($request->post());

        if($testimonial){
            $this->saveJSON();
            return $testimonial;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::where('id', $id)->delete();

        if($testimonial){
            $this->saveJSON();
            return $testimonial;
        }
    }


        /**
     * Upload Image for api editing testimonial
     *
     * @param  \Request $request
     * @return string
     */
    public function upload(Request $request){

        $file = $request->file->store('images/depoimentos');

        return $file;
    }

    /**
     * saveJSON
     *
     * @return void
     */
    public function saveJSON()
    {
       $testimonials = Testimonial::where("status", 1)->get();

       $json = Collection::make($testimonials)
                    ->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return Storage::put('data/testimonials.json', $json);
    }
}
