<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('検索結果') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('detail') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                {{ __('詳細を見る') }}

            </a>
            <a href="{{ route('post.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                {{ __('お店を投稿する') }}
            </a>

            <a href="{{ route('myposts') }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('自分の投稿を確認する') }}
                
            </a>
        </div>

        <div class="my-4">
            @if (!empty($posts))
                <ul>
                    @foreach ($posts as $post)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-2 border-bottom">{{ $post->storename }}</h3>
                            <p class="text-gray-1000 mt-4">{{ $post->adrees }}</p>
                            <p class="text-gray-1000 mt-4">{{ $post->phone_number}}</p>
                            <p class="text-gray-1000 mt-4">{{ $post->opentime }}</p>
                            <p class="text-gray-1000 mt-4">{{ $post->closetime }}</p>
                            <p class="text-gary-1000 mt-4">{{ $post->homepage_url }}</p>
                            <div class="flex justify-between mt-8">
                                <p class="text-gray-600">{{ $post->user->name }}</p>
                                <p class="text-gray-600">{{ $post->updated_at }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">投稿したお店はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
