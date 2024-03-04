<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Form</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css'>
</head>
<body>
<div class="min-h-screen bg-gray-100 flex flex-col justify-center">
    <div class="container mx-auto">
        <div class="bg-white p-8 border border-gray-300">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Titre</label>
                    <input type="text" name="titre" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Description</label>
                    <textarea name="description" class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
                </div>
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Date</label>
                    <input type="date" name="date" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Lieu</label>
                    <input type="text" name="lieu" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Category ID</label>
                    <input type="number" name="category_id" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Places Disponible</label>
                    <input type="number" name="places_Disponible" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div>
                    <label class="text-sm font-bold text-gray-600 block">Organizer ID</label>
                    <input type="number" name="organizer_id" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div>
                    <button type="submit" class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-700 rounded-md text-white text-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
