    <x-app-layout>
        <div class="container mx-auto py-8 px-4 md:px-8">
            <x-form.breadcrumb :items="['Home', 'Governorates']" :routes="['/', '/governorates']" />
            <x-alert />
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Governorates</h1>
                <div class="flex space-x-2">
                    <a href="{{ route('governorates.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Create
                    </a>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Number Of Cities in the Governorate</th>
                            <th scope="col" class="px-4 py-3">Created At</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ $counter = 1 }}
                        @forelse ($governorates as $governorate)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-3">{{ $counter++ }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('governorates.show', $governorate) }}"
                                        class="text-blue-600 hover:underline">{{ $governorate->name }}
                                    </a>
                                </td>
                                <td class="px-4 py-3">
                                    <span
                                        class="text-gray-500">{{ $governorate->cities->count() > 0 ? $governorate->cities->count() : 'No city has been alocated' }}</span>
                                </td>
                                <td class="px-4 py-3">{{ $governorate->created_at->diffForHumans() }}</td>
                                <td class="
                                    px-4 py-3 flex space-x-2">
                                    <a href="{{ route('governorates.edit', $governorate->id) }}"
                                        class="inline-flex items-center px-2 py-1 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit
                                    </a>
                                    <form action="{{ route('governorates.destroy', $governorate->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center">No governorates found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $governorates->links() }}
    </x-app-layout>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
