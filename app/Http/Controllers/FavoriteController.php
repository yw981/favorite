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
        // TODO 判断未登录
        $user = $request->user();
        $input = $request->all();



        if(isset($input['autoTitle'])||!isset($input['title'])){
            $urlContent = file_get_contents($input['url']);
            // TODO 编码问题
            if(strpos($urlContent,'charset=gb2312')!==false||strpos($urlContent,'charset="gb2312"')!==false){
                $urlContent = iconv("gb2312","utf-8",$urlContent);
            }
            elseif(strpos($urlContent,'charset=gbk')!==false||strpos($urlContent,'charset="gbk"')!==false){
                $urlContent = iconv("gbk","utf-8",$urlContent);
            }

            $posBegin = strpos($urlContent,'<title>')+7;
            $posEnd = strpos($urlContent,'</title>');
            $length = $posEnd - $posBegin;
            $input['title'] = substr($urlContent,$posBegin,$length);
        }

//dd($input);
        $input['user_id'] = $user->id;
        $input['published_at'] = Carbon::now();
        //dd($input);
        Favorite::create($input);
        return redirect('/favorites');
    }
}
