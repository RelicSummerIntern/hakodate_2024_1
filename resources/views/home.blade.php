<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            グルメ函館コンパス
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('search') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    お店を検索する
                </a>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('post.create') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    お店を登録する
                </a>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('myposts') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    自分の投稿を確認する
                </a>
            </div>
        </div>
    </div>
</x-app-layout>