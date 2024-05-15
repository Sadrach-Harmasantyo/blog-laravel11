<x-layout.app-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    @foreach ($blogs as $blog)
        <article class="p-8 border-b-2 border-gray-200 max-w-screen-md">
            <h1 class="text-3xl font-bold">{{ $blog['title'] }}</h1>
            <p class="text-lg font-semibold">{{ $blog['author'] }} | {{ $blog['created_at'] }}</p>
            <p class="py-5 font-light">{{ Str::limit($blog['body'], 100) }}</p>
            <a href="/blog/{{ $blog['id'] }}" class="text-blue-500">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout.app-layout>
