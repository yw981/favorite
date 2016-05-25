<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function create(){
        if(\Auth::guest()){
            return redirect('/login');
        }
        else{
            $tags = Tag::all();
            return view('tag.create',['tags'=>$tags]);
        }
    }

    public function store(Request $request){
        if(\Auth::guest()){
            return redirect('/login');
        }
        else{
            //$tags = Tag::lists('name','id');
            //dd($tags);
            $input = $request->all();
            Tag::create($input);
            return redirect('/tag/create');
        }
    }

    public function tag($id){
        $tag = Tag::find($id);
        $favorites = $tag->favorites;
        $tags = Tag::all();
        $curTagId = $id;
        //直接return $favorites就是JSON
        return view('favorite.index',compact('favorites','tags','curTagId'));
    }
}
