<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規登録') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="bg-white shadow p-6 rounded-lg">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="storesname" class="block text-gray-700 text-sm font-bold mb-2">店名</label>
                        <input type="text" name="storesname" id="storesname" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">住所</label>
                        <input type="text" name="address" id="address" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="access" class="block text-gray-700 text-sm font-bold mb-2">アクセス</label>
                        <input type="text" name="access" id="access" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">電話番号</label>
                        <input type="text" name="phone_number" id="phone_number" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="times" class="block text-gray-700 text-sm font-bold mb-2">営業時間</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex flex-col">
                                <label for="opentime" class="block text-gray-700 text-sm font-bold mb-2">開店</label>
                                <input type="time" name="opentime" id="opentime" class="w-24 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                            </div>
                            <div class="flex flex-col">
                                <label for="closetime" class="block text-gray-700 text-sm font-bold mb-2">閉店</label>
                                <input type="time" name="closetime" id="closetime" class="w-24 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                            </div>
                            <div class="flex flex-col ml-8">
<label for="closeddays" class="block text-gray-700 text-sm font-bold mb-2">定休日</label>
                                <div class="p-2">
                                    @foreach ($closeddays as $closedday)
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="closeddays[]" value="{{ $closedday->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                                            <span class="ml-2 text-gray-700">{{ $closedday->week }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 既存のタグチェックボックス -->
<div class="mb-4">
    <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">タグ</label>
    <div class="p-2">
        @foreach ($tags as $tag)
            <label class="inline-flex items-center">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                <span class="ml-2 text-gray-700">{{ $tag->tagname }}</span>
            </label>
        @endforeach
    </div>
</div>
<!-- 新規タグ入力フォーム -->
<div class="mb-4">
    <label for="new_tags" class="block text-gray-700 text-sm font-bold mb-2">新規タグ (カンマで区切る)</label>
    <input type="text" name="new_tags" id="new_tags" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" placeholder="例: タグ1, タグ2, タグ3">
</div>

                    <div class="mb-4">
                        <label for="homepage_url" class="block text-gray-700 text-sm font-bold mb-2">URL (HP, SNS等)</label>
                        <input type="url" name="homepage_url" id="homepage_url" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">ジャンル</label>
                        <input type="text" name="genre" id="genre" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">写真</label>
                        <input type="file" name="photo" id="photo" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
                        <a href="{{ route('home') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- 以下を使うと枠が可変になる
<div class="mb-4">
        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">本文</label>
        <textarea name="body" id="body" rows="6" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required></textarea>
</div> -->
