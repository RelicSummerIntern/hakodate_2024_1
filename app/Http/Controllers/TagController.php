<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Store;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function search(Request $request)
    {
        $tagIds = $request->input('tags', []);
        $stores = Store::whereHas('tags', function($query) use ($tagIds) {
            $query->whereIn('id', $tagIds);
        })->get();

        $tags = Tag::all(); // 再度タグリストを取得して、選択可能なタグも表示
        return view('tags.search', compact('stores', 'tags'));
    }
}