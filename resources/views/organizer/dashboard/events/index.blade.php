@include('components.header')
@include('components.aside')
<div class="p-4 sm:ml-64 bg-[#eceef2]">
    <div class="p-4 border-2 border-gray-300 border-dashed rounded-lg">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="font-bold text-3xl mb-5 ml-4 text-gray-700">Manuelle </h1>

            <div class="relative p-4 overflow-x-auto sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">

                            @if(session('alert'))
                                <script>
                                    alert("{{ session('alert') }}");
                                </script>
                            @endif

                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6">Event ID</th>
                                <th scope="col" class="py-3 px-6">Event Name</th>
                                <th scope="col" class="py-3 px-6">Event Date</th>
                                <th scope="col" class="py-3 px-6">Status</th>
                                <th scope="col" class="py-3 px-6">Actions</th>
                            </tr>
                            </thead>
                            <tbody>


                            @if($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @foreach($events as $event)
                                <tr class="bg-white border-b">
                                    <td class="py-4 px-6">{{ $event->id }}</td>
                                    <td class="py-4 px-6">{{ $event->titre }}</td>
                                    <td class="py-4 px-6">{{ $event->date }}</td>
                                    <td class="py-6 px-6">

                                        <span class="bg-red-100 text-red-800 text-xs font-medium rounded dark:bg-red-900 dark:text-red-300 min-w-[120px] block text-center"> {{ $event->is_approved ? 'Approved' : 'Not Approved' }}</span>

                                    </td>

                                    <td class="py-4 px-6 flex items-center space-x-2">
                                        <form action="{{ route('organizer.events.delete') }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                Delete
                                            </button>
                                        </form>

                                        <a href="{{ route('organizer.events.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Edit
                                        </a>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                <form class="space-y-4" action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="event_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="titre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" name="lieu" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Category ID</label>

                        <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>


                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Available Places</label>
                        <input type="number" name="places_Disponible" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
                    </div>


                    <div>
                        <input type="hidden" name="is_approved" value="0"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Acceptance Mode</label>
                        <div class="flex items-center mb-4">
                            <input id="auto_accept_manual" name="auto_accept" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" checked>
                            <label for="auto_accept_manual" class="block ml-2 text-sm font-medium text-gray-900">
                                Manual
                            </label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="auto_accept_auto" name="auto_accept" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                            <label for="auto_accept_auto" class="block ml-2 text-sm font-medium text-gray-900">
                                Automatic
                            </label>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="w-full py-3 px-6 bg-blue-500 hover:bg-blue-700 rounded-md text-white text-sm font-medium">Submit</button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
