<?php

namespace App\Http\Controllers;

use App\Favorite;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index(){
        $favorites = Favorite::all();
        //直接return $favorites就是JSON
        return view('favorite.index',compact('favorites'));
    }

    public function create(){
        if(\Auth::guest()){
            return redirect('/login');
        }
        else{
            return view('favorite.create');
        }
    }

    public function store(Request $request){
        $user = $request->user();
        $input = $request->all();
        //dd($request->all());
        $input['user_id'] = $user->id;
        $input['published_at'] = Carbon::now();
        //dd($input);
        Favorite::create($input);
        return redirect('/favorites');
    }
}
