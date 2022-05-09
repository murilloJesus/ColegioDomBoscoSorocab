<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Image::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->post();

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $ext = $request->file('file')->getClientOriginalExtension();
                $name = $request->file('file')->getClientOriginalName();
                $data['source'] = $request->file('file')->storeAs(
                    'images',
                    str_replacer(str_normalize(
                        $request->name ?
                        $request->name.".".$ext :
                        $name))
                );
            }
        }

        return Image::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return $image;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $data = $request->input();

        return $data;

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $ext = $request->file('file')->getClientOriginalExtension();
                $name = $request->file('file')->getClientOriginalName();
                $data['source'] = $request->file('file')->storeAs(
                    'images',
                    str_replacer(str_normalize(
                        $request->name ?
                        $request->name.".".$ext :
                        $name))
                );
            }
        }

        if( $image->fill($data)->save() ){
            return $image;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        return $image->delete();
    }
}
