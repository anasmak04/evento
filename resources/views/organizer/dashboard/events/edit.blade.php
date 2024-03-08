<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<div class="mt-8 max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
    @if($event)
        <form action="{{ route('organizer.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="event_image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input value="{{$event->titre}}" type="text" name="titre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5" rows="4">{{$event->description}}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Date</label>
                <input value="{{$event->date}}" type="date" name="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Location</label>
                <input value="{{$event->lieu}}" type="text" name="lieu" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Category ID</label>
                <select name="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($event->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Available Places</label>
                <input type="number" name="places_Disponible" value="{{$event->places_Disponible}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm p-2.5">
            </div>


            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Acceptance Mode</label>
                <div class="flex items-center mb-4">
                    <input id="auto_accept_manual" name="auto_accept" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" @if($event->auto_accept == 0) checked @endif>
                    <label for="auto_accept_manual" class="ml-2 text-sm font-medium text-gray-900">
                        Manual
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="auto_accept_auto" name="auto_accept" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" @if($event->auto_accept == 1) checked @endif>
                    <label for="auto_accept_auto" class="ml-2 text-sm font-medium text-gray-900">
                        Automatic
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full py-3 px-6 bg-blue-500 hover:bg-blue-700 rounded-md text-white text-sm font-medium transition duration-150 ease-in-out">
                    Submit
                </button>
            </div>
        </form>
    @endif
</div>

</body>
</html>
