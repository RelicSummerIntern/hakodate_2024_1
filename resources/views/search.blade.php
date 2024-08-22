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
                        <div class="flex flex-wrap">
                            @foreach ($tags as $tag)
                                <div class="p-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                                        <span class="ml-2 text-gray-700">{{ $tag->name }}</span>
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
                            <div class="border-b border-gray-200 py-4">
                                <h3 class="text-lg font-semibold">{{ $store->storename }}</h3>
                                <p class="text-gray-600">{{ $store->address }}</p>
                                <p class="text-gray-600">電話番号: {{ $store->phone_number }}</p>
                                <p class="text-gray-600">開店時間: {{ $store->opentime }} - 閉店時間: {{ $store->closetime }}</p>
                                <a href="{{ $store->homepage_url }}" target="_blank" class="text-blue-500">ホームページ</a>
                                <img src="{{ $store->photo }}" alt="Store Photo" class="mt-2 max-w-xs">
                                <a href="{{ route('detail', ['id' => $store->id]) }}" class="text-blue-500">詳細</a>
                            </div>
                        @empty
                            <p class="text-gray-600">該当するお店はありません。</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
