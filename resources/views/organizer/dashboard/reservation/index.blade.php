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
                    <th scope="col" class="px-6 py-3">User name</th>
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
                        @foreach ($event->users as $user)
                        <td class="px-6 py-4">{{$user->name}}</td>
                        <td class="px-6 py-4">{{$event->category_id}}</td>
                        <td class="px-6 py-4">{{$event->places_Disponible}}</td>
                        <td class="px-6 py-4">{{$event->auto_accept ? 'Yes' : 'No'}}</td>
                        <td>
                            <form action="{{ route('events.updateAutoAccept', $event->id) }}" method="POST">
                                @csrf
                                @method("patch")
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit">Approve</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
