<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

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
        return view('post.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'storesname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'access' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'opentime' => 'required|string|max:255',
            'closetime' => 'required|string|max:255',
            'homepage_url' => 'required|string|max:255',
            'genre' => 'required|string|max:255'
        ]);

        $store = new Store();
        $store->create($request->input())->tags()->attach($request->input('tags'));

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

