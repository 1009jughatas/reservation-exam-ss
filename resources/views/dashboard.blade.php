<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->is_admin)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Welcome, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            (Admin)</h3>
                    </div>
                </div>

                <!-- Card: Number of Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Total Users</h3>
                        <p>{{ $users_count }}</p>
                    </div>
                </div>

                <!-- Card: Manage Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Manage Users</h3>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-5 py-2">Name</th>
                                    <th class="px-5 py-2">Email</th>
                                    <th class="px-2 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border px-5 py-2">{{ $user->firstname }} {{ $user->lastname }}</td>
                                        <td class="border px-5 py-2">{{ $user->email }}</td>
                                        <td class="border px-2 py-2 flex">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="text-blue-500 mr-2">Edit</a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Card: Number of Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Total Shows</h3>
                        <p>{{ $shows_count }}</p>
                    </div>
                </div>

                <!-- Card: Manage Shows -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Manage Shows</h3>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shows as $show)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $show->title }}</td>
                                        <td class="border px-4 py-2 flex">
                                            <a href="{{ route('admin.shows.edit', $show->id) }}"
                                                class="text-blue-500 mr-2">Edit</a>
                                            <form action="{{ route('admin.shows.destroy', $show->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.shows.create') }}" class="text-blue-500 mt-2 inline-block">Add New Show</a>
                    </div>
                </div>


                <!-- Card: Number of Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Total Artists</h3>
                        <p>{{ $artists_count }}</p>
                    </div>
                </div>


                <!-- Card: Manage Artists -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Manage Artists</h3>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($artists as $artist)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $artist->firstname }} {{ $artist->lastname }}</td>
                                        <td class="border px-4 py-2 flex">
                                            <a href="{{ route('admin.artists.edit', $artist->id) }}"
                                                class="text-blue-500 mr-2">Edit</a>
                                            <form action="{{ route('admin.artists.destroy', $artist->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.artists.create') }}" class="text-blue-500 mt-2 inline-block">Add New
                            Artist</a>
                    </div>
                </div>

            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Welcome, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!
                        </h3>
                        <p>We're glad to see you back!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>