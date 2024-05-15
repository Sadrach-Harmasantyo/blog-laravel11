<x-layout.app-layout2>
    <x-slot name="title">
        Post Show Page
    </x-slot>

    <main class="max-w-screen-md mx-auto my-10">
        <h1 class="text-2xl font-bold mb-5">{{ $post->title }}</h1>
        <p class="mb-5">{{ $post->content }}</p>

        @can('update', $post)
            <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-slate-50 p-2 hover:bg-opacity-90">Edit</a>
        @endcan
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-slate-50 p-2 hover:bg-opacity-90">Delete</button>
            </form>
        @endcan

    </main>
</x-layout.app-layout2>
