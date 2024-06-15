<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-form.breadcrumb :items="['Home', 'Posts', $post->title]" :routes="['/', '/posts', route('posts.show', $post)]" />
        <x-alert />
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Post Title: {{ $post->title }}</h1>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Created at: {{ $post->created_at->toFormattedDateString() }}</p>
            <div class="mt-6">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Content:</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="mt-6">
                {{-- <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Clients:{{ $post->clients->count() }}</h2> --}}
                {{-- @forelse ($clients as $client) --}}
                    {{-- <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $clients->name }}</p> --}}
                {{-- @empty
                    <p class="mt-2 text-gray-600 dark:text-gray-400">No clients found for this post.</p>
                @endforelse --}}
            </div>
            <div class="mt-6 flex space-x-2">
                <a href="{{ route('posts.edit', $post->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?');" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
