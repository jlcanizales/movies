<?php

namespace App\Http\Controllers;

use View;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class MoviesController extends Controller
{

    public function index()
    {
        return view("index");
    }

    public function search(Request $request)
    {
        $name =  $request->input("name");
        if($name==""){
                return redirect()->back()->with('error', "You sould search an actor for a name");
        }
        $url=html_entity_decode("http://api.themoviedb.org/3/search/person?");
        $options = array("api_key"=>"af5b30b8759307d572388fceb9fa4331","query"=>$name,"sort_by"=>"release_date.asc");
        $url .= http_build_query($options,'','&');
        $myData = file_get_contents($url) or die(print_r(error_get_last()));
        $actors = json_decode($myData);
        foreach($actors->results as $i => $v)
        {
            \Debugbar::info($v);
        }
        return redirect('/')->with("actors",$actors->results);
    }
    public function getActor($id)
    {
        $url=html_entity_decode("http://api.themoviedb.org/3/person/".$id."/movie_credits?");
        $options = array("api_key"=>"af5b30b8759307d572388fceb9fa4331","sort_by"=>"release_date.desc");
        $url .= http_build_query($options,'','&');
        $myData = file_get_contents($url) or die(print_r(error_get_last()));
        $movies = json_decode($myData);
        foreach($movies->cast as $i => $v)
        {
            \Debugbar::info($v);
        }
        return view('index')->with('data', $movies->cast);
    }

}
