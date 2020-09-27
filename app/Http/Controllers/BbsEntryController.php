<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsEntry;
use Illuminate\Support\Facades\Validator;

class BbsEntryController extends Controller
{
    //
    function index() 
    {
        // データベースからデータを全て取ってくる(RailsでいうところのPost.all)
        $item_list = BbsEntry::orderBy("id", "desc")->get();
        // データベースからデータを引っ張ってくるだけではなく、ビューも表示する
        return view("bbs_entry_list", ["item_list" => $item_list]);
    }

    function create(Request $request)
    {
        // validationを用いた書き方
        $input = $request->only('author', 'title', 'body');
        $validator = Validator::make($input, [
            'author' => 'required|string|max:30',
            'title' => 'required|string|max:30',
            'body' => 'required|string|max:100'
        ]);
        
        // バリデーションの失敗
        if($validator->fails())
        {
            return redirect('/')
                ->withErrors($validator);
        }

        // onlyメソッドは、必要な値の身を取得するように制限をかけることができるc
        $input = $request->only('author', 'title', 'body');
        // dd()メソッドは、受け取ったデータを特殊なフォーマットで表示する
        
        $entry = new BbsEntry();
        $entry->author = $input["author"];
        $entry->title = $input["title"];
        $entry->body = $input["body"];
        $entry->save();

        // Railsでいうところのredirect_toに当たる
        return redirect('/');
    }
}
