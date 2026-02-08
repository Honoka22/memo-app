<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $memo = \App\Models\Memo::create([
            'content' => $validated['content'],
        ]);

        return response()->json($memo, 201);
    }

    public function index()
    {
        // メモを全て取得
        $memos = Memo::orderBy('created_at', 'desc')->get();

        // JSON形式でレスポンスを返す
        return response()->json($memos);
    }

}

