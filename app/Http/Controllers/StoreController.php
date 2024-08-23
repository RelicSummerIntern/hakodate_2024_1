<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Closedday;

class StoreController extends Controller
{
    public function search(Request $request)
    {
        // クエリパラメータからタグIDを取得
        $tagIds = $request->input('tags', []);
        
        // タグIDが指定された場合の検索
        if (!empty($tagIds)) {
            $stores = Store::whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds);
            })->get();
        } else {
            $stores = Store::all(); // タグが指定されていない場合は全店舗を取得
        }

        $tags = Tag::all(); // タグ一覧を取得

        return view('search', compact('stores', 'tags'));
    }

    public function show($id)
    {
        // 'with'メソッドを使って 'tags' と 'closedDays' リレーションをロードする
        $store = Store::with(['tags', 'closeddays'])->findOrFail($id);

        // 'store.show' ビューに 'store' を渡す
        return view('detail', compact('store'));
    }
}
