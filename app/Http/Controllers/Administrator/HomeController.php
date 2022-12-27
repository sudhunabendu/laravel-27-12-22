<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Libraries\XmlHelper;
// use Mtownsend/XmlToArray/XmlToArray;
use Mtownsend\XmlToArray\XmlToArray;

class HomeController extends Controller
{
    // public function index(){
    //     $title = 'Dashboard';
    //     return view('Administrator.layouts.master',compact('title'));
    // }

    public function index(){
        $title = 'Dashboard';
        // return XmlHelper::xml();
        $arr = [];
        $arr = XmlHelper::xml();
        return view('Administrator.dashboard.index',compact('title','arr'));
        // return response()->view('Administrator.xmls.timezoneCurrency', ['title' => $title])->header('Content-Type', 'text/xml');
    }

    // public function index(){
    //     $title = 'Dashboard';
    //     $arr = XmlHelper::xml();
    //     return view('Administrator.dashboard.index',compact('arr'))->with(['arr' => $arr, 'title'=>$title]);


    // }
}
