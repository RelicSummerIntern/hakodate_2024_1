<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規登録') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="bg-white shadow p-6 rounded-lg">
                <form action="{{ route('post.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="storename" class="block text-gray-700 text-sm font-bold mb-2">店名</label>
                        <input type="text" name="storename" id="storename" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="storename" class="block text-gray-700 text-sm font-bold mb-2">住所</label>
                        <input type="text" name="adress" id="adress" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
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
                                <input type="time" name="opentime" id="opentime" class="w-24 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" step="900">
                            </div>
                            <div class="flex flex-col">
                                <label for="closetime" class="block text-gray-700 text-sm font-bold mb-2">閉店</label>
                                <input type="time" name="closetime" id="closetime" class="w-24 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" step="900">
                            </div>
                            <div class="flex flex-col ml-8">
                                <span class="block text-gray-700 text-sm font-bold mb-2">定休日</span>
                                <div class="flex space-x-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="monday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">月</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="tuesday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">火</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="wednesday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">水</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="thursday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">木</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="friday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">金</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="saturday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">土</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="sunday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">日</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="holiday" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">祝</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="closeddays" value="irregular" class="form-checkbox text-indigo-600">
                                        <span class="ml-2">不定休</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タグ</label>
                        <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">URL (HP, SNS等)</label>
                        <input type="url" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">ジャンル</label>
                        <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">写真</label>
                        <input type="file" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
                        <a href="{{ route('post.index') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
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
