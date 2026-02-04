<?php

namespace App\Http\Controllers;

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

}

