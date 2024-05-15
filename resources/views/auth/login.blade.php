<x-layout.app-layout2>
    <x-slot name="title">
        Login Page
    </x-slot>

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <span class="text-red-500 text-sm">{{ $error }}</span>
        @endforeach
    @endif --}}

    <form action="{{ route('login.store') }}" method="POST"
        class="max-w-screen-md mx-auto bg-slate-200 p-5 my-10 flex flex-col gap-3">
        @csrf

        <label for="email" class="font-semibold">Email</label>
        <input name="email" id="email" placeholder="example@email.com" class="p-2 text-sm" type="email" autofocus>
        @error('email')
            <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
        @enderror

        <label for="password" class="font-semibold">Password</label>
        <input type="password" name="password" id="password" class="p-2 text-sm">
        @error('password')
            <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
        @enderror

        <button type="submit" class="bg-blue-500 text-white p-2">Login</button>
    </form>

</x-layout.app-layout2>
