<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class GalleryController extends Controller
{

    private FilesystemAdapter $storage;
    private $private_path = "/images/galerias/";
    private $directories;
    private $json;

    public function __construct()
    {
        $this->storage = Storage::disk('local');
        $this->directories = $this->storage->allDirectories($this->private_path);
        $this->json = json_decode(Storage::get('data/galerias.json'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $retorno = [];

        foreach ($this->json as $key => $value) {
            $retorno[] = [
                "path" => $value->path,
                "name" => $value->name,
                "image" => $value->background,
                "indice" => isset($value->indice) ? $value->indice : 999
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
        $file = $request->file->storeAs('zips', $request->file('file')->getClientOriginalName()); // OK

        $zip = new ZipArchive;
        $res = $zip->open(storage_path("app/$file"));
        if($res === TRUE){// OK
            $galeria =  $zip->extractTo(storage_path("app$this->private_path"));
            if($galeria){
                $this->saveJSON($this->getGalerias());
                return $galeria;
            }
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = $this->storage->deleteDirectory($this->directories[$id]);

        if($galeria){
            $this->saveJSON($this->getGalerias());
            return $galeria;
        }
    }

    public function repliceJSON(Request $request)
    {
        $indices = $request->toArray();
        $json = $this->json;

        foreach ($indices as $key => $value) {
            foreach ($json as $chave => $valor) {
                if($valor->name == $key){
                    $json[$chave]->indice = $value;
                    break;
                }
            }
        }

        $this->saveJSON($json);

        return -1;

    }



    private function backgroundImage($directory)
    {
        $images = $this->storage->exists("$directory/background.jpg") ? ["$directory/background.jpg"] : $this->storage->allFiles($directory);

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

    private function getGalerias()
    {
        $galerias = [];
        $json = $this->json;

        foreach ($this->storage->allDirectories($this->private_path) as $dir ) {
            $nome = $this->getNome($dir);

            $galerias[] = [
                "name" => $nome,
                "path" => $dir,
                "background" => $this->backgroundImage($dir),
                "images" => $this->getImages($dir),
                "indice" => $this->getIndice($nome, $json)
            ];
        }

        return $galerias;
    }

    private function getImages($galeria)
    {
        $images = [];
        foreach ($this->storage->allFiles($galeria) as $image ) {

            $images[] = [
                "name" => $this->getNome($image, 'img'),
                "source" => $image
            ];
        }

        return $images;
    }

    public function getIndice($nome, $json)
    {

        foreach ($json as $chave => $valor) {
            if($valor->name == $nome){
                return $json[$chave]->indice;
                break;
            }
        }

        return 999;
    }

    private function getNome($path, $type = 'dir')
    {
        switch($type){
            case 'dir':
                $name = explode("/", $path);
                $name = end($name);
            break;

            case 'img':
                $img = explode("/", $path);
                $img_name = explode(".", end($img));
                $name = $img_name[0];
            break;
        }

            $name = str_replace(['-', '_'], ' ', $name);
            return $name;
    }


    /**
     * saveJSON
     *
     * @return void
     */
    public function saveJSON($galerias)
    {
        $json = Collection::make($galerias)
                    ->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return Storage::put('data/galerias.json', $json);
    }
}
