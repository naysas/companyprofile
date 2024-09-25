<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Service;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'about' => About::first(),
            'services' => Service::limit(4)->get(),
            'blog' => Blog::limit(4)->get(),
            'content' => 'home/home/index'
        ];
        return view('home.layouts.wrapper', $data);
    }

    public function about()
    {
        $data = [
            'about' => About::first(),
            'content' => 'home/about/index'
        ];
        return view('home.layouts.wrapper', $data);
    }

    public function service()
    {
        $data = [
            'services' => Service::all(),  // Dapatkan semua layanan
            'content' => 'home/services/index'
        ];
        return view('home.layouts.wrapper', $data);
    }
}

?>