<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Closedday;
use App\Models\Store;

class CloseddayController extends Controller
{
    public function index()
    {
        $closeddays = Closedday::all();
        return view('closeddays.index', compact('closeddays'));
    }

    public function search(Request $request)
    {
        $closeddayIds = $request->input('closeddays', []);
        $stores = Store::whereHas('closeddays', function($query) use ($closeddayIds) {
            $query->whereIn('id', $closeddayIds);
        })->get();

        $closeddays = Closedday::all(); // 再度タグリストを取得して、選択可能なタグも表示
        return view('closeddays.search', compact('stores', 'closeddays'));
    }
}
