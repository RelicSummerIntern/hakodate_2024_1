<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->storesname }} の詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- 店舗名 -->
                    <h3 class="text-2xl font-semibold mb-4">{{ $store->storesname }}</h3>

                    <!-- 店舗画像 -->
                    @if($store->photo)
                        <img src="{{ asset(str_replace( 'public/', 'storage/', $store->photo)) }}" alt="{{ $store->storesname }}" class="mb-4 max-w-full h-auto">
                    @else
                        <p class="text-gray-600 mb-4">画像はありません。</p>
                    @endif

                    <!-- 紐づけられたタグ -->
                    @if($store->tags->isNotEmpty())
                        <div class="mb-4">
                            <h4 class="text-lg font-semibold">タグ:</h4>
                            <ul class="list-disc pl-5">
                                @foreach($store->tags as $tag)
                                    <li class="text-gray-600">{{ $tag->tagname }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- 店舗情報 -->
                    <p class="text-gray-600">住所: {{ $store->address }}</p>
                    <p class="text-gray-600">電話番号: {{ $store->phone_number }}</p>
                    <p class="text-gray-600">開店時間: {{ $store->opentime }} - 閉店時間: {{ $store->closetime }}</p>
                    <!-- 定休日 -->
                    @if($store->closeddays->isNotEmpty())
                        <p class="text-gray-600">定休日: 
                            @foreach($store->closeddays as $closedday)
                                {{ $closedday->week }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    @else
                        <p class="text-gray-600">定休日はありません。</p>
                    @endif

                    @if($store->homepage_url)
                        <p class="text-gray-600">ホームページ: <a href="{{ $store->homepage_url }}" target="_blank" class="text-blue-500">{{ $store->homepage_url }}</a></p>
                    @endif

                    <!-- ジャンル -->
                    @if($store->genre)
                        <p class="text-gray-600">ジャンル: {{ $store->genre }}</p>
                    @endif

                    <!-- 戻るボタン -->
                    <div class="mt-6 text-center">
                        <button onclick="history.back()" class="bg-gray-500 text-white py-2 px-4 rounded">
                            戻る
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
