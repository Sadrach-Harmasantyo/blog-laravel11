<x-layout.app-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <article class="p-8 max-w-screen-md">
        <h1 class="text-3xl font-bold">{{ $blog['title'] }}</h1>
        <p class="text-lg font-semibold">{{ $blog['author'] }} | {{ $blog['created_at'] }}</p>
        <p class="py-5 font-light">{{ $blog['body'] }}</p>
        <a href="/blog" class="text-blue-500">&laquo; Back to blog</a>
    </article>

</x-layout.app-layout>
