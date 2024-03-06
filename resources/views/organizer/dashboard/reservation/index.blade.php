@include('components.header')
@include('components.aside')
<div class="p-4 sm:ml-64 bg-[#eceef2]">
    <div class="p-4 border-2 border-gray-300 border-dashed rounded-lg">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="font-bold text-3xl mb-5 ml-4 text-gray-700">Manuelle</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Titre</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Lieu</th>
                    <th scope="col" class="px-6 py-3">Category ID</th>
                    <th scope="col" class="px-6 py-3">Places Disponible</th>
                    <th scope="col" class="px-6 py-3">Auto Accept</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{$event->id}}</td>
                        <td class="px-6 py-4">{{$event->titre}}</td>
                        <td class="px-6 py-4">{{$event->description}}</td>
                        <td class="px-6 py-4">{{$event->date}}</td>
                        <td class="px-6 py-4">{{$event->lieu}}</td>
                        <td class="px-6 py-4">{{$event->category_id}}</td>
                        <td class="px-6 py-4">{{$event->places_Disponible}}</td>
                        <td class="px-6 py-4">{{$event->auto_accept ? 'Yes' : 'No'}}</td>
                        <td>
                            <form action="{{ route('events.updateAutoAccept', $event->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="auto_accept" value="1">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Accept
                                </button>
                            </form>

                            <form action="{{ route('events.updateAutoAccept', $event->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="auto_accept" value="0">
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Refuse
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
