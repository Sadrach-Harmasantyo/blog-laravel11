<nav class="bg-black text-slate-50 py-7 px-5">
    <div class="flex gap-10 container mx-auto justify-end">
        <x-navbar.nav-link2 href="/posts" :active="request()->is('posts')">Post</x-navbar.nav-link2>

        @auth
            <x-navbar.nav-link2 href="/posts/create" :active="request()->is('posts/create')">Create Post</x-navbar.nav-link2>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-navbar.nav-link2 href="{{ route('register') }}" :active="false"
                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-navbar.nav-link2>
            </form>

            <p>Hello, {{ auth()->user()->name }}</p>
        @endauth

        @guest
            <x-navbar.nav-link2 href="{{ route('login') }}" :active="request()->is('login')">Login</x-navbar.nav-link2>
            <x-navbar.nav-link2 href="{{ route('register') }}" :active="request()->is('register')">Register</x-navbar.nav-link2>
        @endguest

    </div>
</nav>
