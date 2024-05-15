<x-layout.app-layout2>
    <x-slot name="title">
        Admin Page
    </x-slot>

    {{-- <p>Hello my name is {{ $name }} and i'am {{ $age }} years old</p> --}}

    <div class="mx-auto my-10">
        {{-- @foreach ($posts as $post)
            <div class="p-2 w-full bg-slate-200 flex flex-col gap-3">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        @endforeach --}}
        {{-- <table class="">
            <thead class="">
                <tr>ID</tr>
                <tr>Title</tr>
                <tr>Content</tr>
                <tr>Created At</tr>
                <tr>Action</tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>{{ $post->id }}</tr>
                    <tr>{{ $post->title }}</tr>
                    <tr>{{ $post->content }}</tr>
                    <tr>{{ $post->created_at }}</tr>
                @empty
                    <tr>No Data</tr>
                @endforelse
            </tbody>
        </table> --}}
        <table class="w-full divide-y divide-black border border-black text-sm">
            <thead class="bg-slate-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-black">
                @forelse ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a> --}}
                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                class="bg-blue-500 text-slate-50 p-2 hover:bg-opacity-90">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-slate-50 p-2 hover:bg-opacity-90">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">No Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-layout.app-layout2>
