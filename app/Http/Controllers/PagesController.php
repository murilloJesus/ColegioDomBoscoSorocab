<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Json;

class PagesController extends Controller
{
    public function index()
    {
        $banners = BannerController::getFromJSON();

        return view("pages.home", ["banners" => $banners]);
    }
}
