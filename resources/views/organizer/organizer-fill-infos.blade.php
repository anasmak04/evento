<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizer Information</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css'>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4">
    <h1 class="text-xl font-semibold my-5">Welcome to the Organizer Space</h1>



        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{route("become.organizer")}}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="organization-name">
                        Organization Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="organization-name" type="text" placeholder="Organization Name" name="name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="organization-description">
                        Description
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="organization-description" placeholder="A brief description of your organization" name="description"></input>
                </div>
                <div class="mb-4">

                    <input value="{{ auth()->id() }}" type="hidden" name="organizer_id">
                </div>
                <div class="flex items-center justify-between">
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>


</div>

</body>
</html>
