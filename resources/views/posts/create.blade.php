<x-layout.app-layout2>
    <x-slot name="title">
        Post Create Page
    </x-slot>

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <span class="text-red-500 text-sm">{{ $error }}</span>
        @endforeach
    @endif --}}

    <form action="/posts" method="POST" class="max-w-screen-md mx-auto bg-slate-200 p-5 my-10 flex flex-col gap-3">
        @csrf
        <label for="title" class="font-semibold">Title</label>
        <input type="text" name="title" id="title" placeholder="Title" class="p-2 text-sm" autofocus>
        @error('title')
            <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
        @enderror

        <label for="content" class="font-semibold">Your Message</label>
        <textarea name="content" id="content" cols="30" rows="5" placeholder="Your Message"
            class="w-full p-2 text-sm"></textarea>
        @error('content')
            <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
        @enderror

        <button type="submit" class="bg-blue-500 text-white p-2">Submit</button>
    </form>

</x-layout.app-layout2>
