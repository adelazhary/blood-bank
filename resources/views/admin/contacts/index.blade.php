<x-app-layout>
    <div class="container mx-auto py-8 px-4 md:px-8">
        <x-alert />
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Contacts</h1>
        </div>
        <form action="{{ route('contacts.index') }}" method="GET" class="mb-6 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 items-center">
            <div class="flex-grow md:w-1/3">
                <x-form.input name="search" placeholder="Search by name or email" />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>
        </form>

        <div class="max-w-6xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Created At</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr class="border-b dark:border-gray-700 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                                <td class="px-4 py-3">{{ $contact->id }}</td>
                                <td class="px-4 py-3">{{ $contact->name }}</td>
                                <td class="px-4 py-3">{{ $contact->email }}</td>
                                <td class="px-4 py-3">{{ $contact->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center">No contacts found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    </div>
</x-app-layout>
