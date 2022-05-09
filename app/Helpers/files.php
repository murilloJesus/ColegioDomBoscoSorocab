<?php


use Illuminate\Support\Facades\Storage;

class Files extends Storage
{
    function read_folders($folder){
        $directories = $this->disk('local')->directories("gallery");

        dd($directories);
    }

}
