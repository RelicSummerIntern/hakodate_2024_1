<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お店を検索
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- タグ選択セクション -->
                <form method="GET" action="{{ route('search') }}">
                    <div class="p-6">
                        <label for="choose_tag" class="block text-gray-700 text-lg font-bold mb-2">タグを選択</label>
                        <div class="flex flex-wrap">
                            @foreach ($tags as $tag)
                                <div class="p-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                                        <span class="ml-2 text-gray-700">{{ $tag->tagname }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">検索</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 検索結果表示セクション -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="scrollable max-h-96 overflow-y-auto">
                        @forelse ($stores as $store)
                            <div class="border-b border-gray-200 py-4 flex items-start">
                                <!-- 画像部分 -->
                                <img src="{{ asset(str_replace( 'public/', 'storage/', $store->photo)) }}" alt="Store Photo" class="max-w-xs mr-4">
                            
                                <!-- テキスト部分 -->
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $store->storesname }}</h3>
                                    <p class="text-gray-600">{{ $store->address }} / {{ $store->genre }}</p>
                                    <p class="text-gray-600">電話番号: {{ $store->phone_number }}</p>
                                    <p class="text-gray-600">開店時間: {{ $store->opentime }} - 閉店時間: {{ $store->closetime }}</p>
                                    <a href="{{ route('detail', ['id' => $store->id]) }}" class="text-blue-500">詳細</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">該当するお店はありません。</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 他のコンテンツの下に追加 -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-center">
                <!-- 戻るボタン -->
                <button onclick="window.location.href='{{ route('home') }}'" class="bg-gray-500 text-white py-2 px-4 rounded">
                    戻る
                </button>
            </div>
        </div>
    </div>
</div>
</x-app-layout>



