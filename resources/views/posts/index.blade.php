<x-layout.app-layout2>
    <x-slot name="title">
        Post Page
    </x-slot>

    {{-- <p>Hello my name is {{ $name }} and i'am {{ $age }} years old</p> --}}

    <div class="flex flex-col max-w-screen-md mx-auto gap-4 my-10">
        @foreach ($posts as $post)
            <div class="p-2 w-full bg-slate-200 flex flex-col gap-3">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                <p class="text-sm font-semibold">Created by {{ $post->user->email }}</p>
                <p>{{ $post->content }}</p>
                <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        @endforeach
    </div>
</x-layout.app-layout2>
