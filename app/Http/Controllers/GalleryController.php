<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DateTime;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class GalleryController extends Controller
{

    private FilesystemAdapter $storage;
    private $private_path = "images/galerias/";
    private $directories;

    public function __construct()
    {
        $this->storage = Storage::disk('local');
        $this->directories = $this->storage->allDirectories($this->private_path);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dir =  $this->directories;

        $retorno = [];

        foreach ($dir as $key) {
            $retorno[] = [
                "path" => $key,
                "name" => str_replace($this->private_path, '', $key),
                "image" => $this->backgroundImage($key)
            ];
        }

        return $retorno;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\galleryRequest $request)
    {
        $file = $request->file->storeAs('zips', $request->file('file')->getClientOriginalName());

        $zip = new ZipArchive;
        $res = $zip->open(public_path($file));
        if($res === TRUE){
            return $zip->extractTo($this->private_path);
        }else{
            abort(403, 'Sem autorização');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->storage->allFiles($this->index()[$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zip = new ZipArchive();
        $directory = $this->directories[$id];
        $dir_name = str_replace($this->private_path, '', $directory);
        $fileName = $directory.".zip";
        $zip_ret = $zip->open( ($fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE );

        if ($zip_ret)
        {
            $files = $this->storage->allFiles($directory);
            foreach ($files as $value){
                $relativeName = basename($value);
                $zip->addFile($value, "$dir_name/$relativeName" );
            }
            $zip->close($fileName);
        }

        return response()->download($fileName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\galleryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->storage->deleteDirectory($this->directories[$id]);
    }

    private function backgroundImage($directory)
    {
        $images = $this->storage->exists("$directory/background.jpeg") ? ["$directory/background.jpeg"] : $this->storage->allFiles($directory);

        if($images){
            $image =  $images[0];
            return [
                "path" => $image,
                "modified" => DateTime::createFromFormat("U", $this->storage->lastModified($image))->format("d/m/Y H:i:s")
            ];
        }else {
            return false;
        }
    }


    /**
     * extractImages
     *
     * @param  string $file
     * @param  string $folder
     * @return string
     */
    private function extractImages($file, $folder){

        $zip = new ZipArchive;
        if ($zip->open($file ) === true)
        {

            //make all the folders
            for($i = 0; $i < $zip->numFiles; $i++)
            {
                $OnlyFileName = $zip->getNameIndex($i);
                $FullFileName = $zip->statIndex($i);
                if ($FullFileName['name'][strlen($FullFileName['name'])-1] =="/")
                {
                    @mkdir($folder."/".$FullFileName['name'],0700,true);
                }
            }

            //unzip into the folders
            for($i = 0; $i < $zip->numFiles; $i++)
            {
                $OnlyFileName = $zip->getNameIndex($i);
                $FullFileName = $zip->statIndex($i);

                if (!($FullFileName['name'][strlen($FullFileName['name'])-1] =="/"))
                {
                    if (preg_match('#\.(jpg|jpeg|gif|png)$#i', $OnlyFileName))
                    {
                        copy('zip://'. $file .'#'. $OnlyFileName , $folder."/".$FullFileName['name'] );
                    }
                }
            }
            $zip->close();
        } else
        {
            return  "Error: Can't open zip file";
        }
    }
}
