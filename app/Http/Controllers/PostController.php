<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\Closedday;

class PostController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('updated_at', 'desc')->get();
        return view('post.index', compact('stores'));
    }

    public function create()
    {
        $tags = Tag::all();
        $closeddays = Closedday::all();
        return view('post.create', compact('tags', 'closeddays'));
    }

    public function store(Request $request)
{
    // バリデーション
    $request->validate([
        'storesname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'opentime' => 'required|date_format:H:i',
        'closetime' => 'required|date_format:H:i',
        'homepage_url' => 'required|url',
        'genre' => 'required|string|max:255',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // 入力データの取得
    $input = $request->all();

    // 画像の保存
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $path = $file->store('public/photo');
        $input['photo'] = $path;
    }

    // 店舗の保存
    $store = Store::create($input);

    // 既存タグの処理
    if ($request->has('tags')) {
        $store->tags()->attach($request->input('tags'));
    }

    // 新規タグの処理
    if ($request->has('new_tags')) {
        $newTags = explode(',', $request->input('new_tags'));
        foreach ($newTags as $newTagName) {
            $newTagName = trim($newTagName); // 空白を削除
            if (!empty($newTagName)) {
                // 新規タグを作成
                $tag = Tag::firstOrCreate(['tagname' => $newTagName]);
                // 新規タグを店舗に関連付け
                $store->tags()->attach($tag->id);
            }
        }
    }

    // 定休日の処理
    if ($request->has('closeddays')) {
        $store->closeddays()->attach($request->input('closeddays'));
    }

    return redirect()->route('home')->with('success', '投稿が作成されました');
}


    
    public function myPosts()
    {
        $stores = Store::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-posts', compact('stores'));
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        return view('post.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'storesname' => 'required|string|max:255',
            'address' => 'required|string|max255',
        ]);

        $store = Store::findOrFail($id);
        $store->storesname = $validatedData['storesname'];
        $store->address = $validatedData['address'];
        $store->save();

        return redirect()->route('myposts')->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('myposts')->with('success', '投稿が削除されました');
    }
}

