<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\News;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaCenterController extends Controller
{
    public function index(){

        $teb_images=Image::all();
        $teb_videos=Video::all();
        $teb_news=News::all();
        return view('Site/Media-Center' , compact('teb_news','teb_videos', 'teb_images'));
    }
}
