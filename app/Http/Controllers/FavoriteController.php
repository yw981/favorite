<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index(){
        $favorites = Favorite::latest()->get();
        $tags = Tag::all();
        //dd($tags);
        //直接return $favorites就是JSON
        return view('favorite.index',compact('favorites','tags'));
    }



    public function create(){
        if(\Auth::guest()){
            return redirect('/login');
        }
        else{
            $tags = Tag::lists('name','id');
            //dd($tags);
            return view('favorite.create',compact('tags'));
        }
    }

    public function store(Request $request){
        // TODO 判断未登录
        $user = $request->user();
        $input = $request->all();

        //dd($input);

        if(isset($input['autoTitle'])||!isset($input['title'])){
            $urlContent = file_get_contents($input['url']);
            // TODO 编码问题
            if(strpos($urlContent,'charset=gb2312')!==false||strpos($urlContent,'charset="gb2312"')!==false){
                $urlContent = iconv("gb2312","utf-8//IGNORE",$urlContent);
            }
            elseif(strpos($urlContent,'charset=gbk')!==false||strpos($urlContent,'charset="gbk"')!==false){
                $urlContent = iconv("gbk","utf-8//IGNORE",$urlContent);
                //iconv('UTF-8', 'GBK//IGNORE', unescape(isset($_GET['str'])? $_GET['str']:''));
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
        $favorite = Favorite::create($input);
        if(isset($input['tag_list'])) $favorite->tags()->attach($input['tag_list']);
        return redirect('/favorites');
    }
}
