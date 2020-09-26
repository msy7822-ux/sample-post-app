<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsEntry;

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
