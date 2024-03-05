<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Form</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css'>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold text-center my-6">Waiting for Event Approvals</h1>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">Event ID</th>
                <th scope="col" class="py-3 px-6">Event Name</th>
                <th scope="col" class="py-3 px-6">Event Date</th>
                <th scope="col" class="py-3 px-6">status</th>
            </tr>
            </thead>
            <tbody>

            @foreach($events as $event)
                <tr class="bg-white border-b">
                    <td class="py-4 px-6">{{ $event->id }}</td>
                    <td class="py-4 px-6">{{ $event->titre }}</td>
                    <td class="py-4 px-6">{{ $event->date }}</td>
                    <td class="py-4 px-6">{{ $event->is_approved ? 'Approved' : 'Not_Approved' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <form class="space-y-4" action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

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
                <input type="number" name="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Available Places</label>
                <input type="number" name="places_Disponible" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div>
                <input type="hidden" value="{{auth()->id()}}" name="organizer_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div>
                <input type="hidden" name="is_approved" value="0"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div>
                <button type="submit" class="w-full py-3 px-6 bg-blue-500 hover:bg-blue-700 rounded-md text-white text-sm font-medium">Submit</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
