<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.12/tailwind-experimental.min.css'>
</head>
<style>
    .font{
        font-family: 'Inter';
    }

    .bg{
        background-color: #071D39;
    }
</style>
<body class="bg-[#f7f8fc] font">
    @include("components.navbar")


    <div class="p-4 flex justify-center gap-4 items-center">

        <form action="{{route('home.index')}}" method="get" class="flex gap-2">
            @csrf
            <input name="searchKey" type="text" placeholder="Search..." class="w-80 border border-gray-300 p-2 rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150 ease-in-out" />
            <button type="submit" class="bg-blue-700 text-white p-2 rounded-lg hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-yellow-700 focus:ring-opacity-50 transition duration-150 ease-in-out">
                Search
            </button>
        </form>

        <form action="" method="">
            <select id="categories" class="border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach($categories as $category)
                    <option selected>Choose a category</option>
                    <option>{{$category->name}}</option>
                @endforeach
            </select>

        </form>


    </div>








    <section class="mt-4 mb-8">

        <div class="container mx-auto w-full h-auto grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($events as $event)
                @if(!$event->date->isPast())

                <div class="card border border-gray-200 w-full md:w-[300px] shadow-lg rounded-lg overflow-hidden">
                    <img src="{{$event->getFirstMediaUrl('eventImage')}}" alt="image" class="w-full object-cover">
                    <div class="p-4">
                        <span class="inline-block mt-1 bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$event->category->name}}</span>
                        <h1 class="mt-2 font-bold text-lg text-gray-900">{{$event->titre}}</h1>
                        <h3 class="text-sm text-gray-600">{{$event->lieu}}</h3>
                        <p class="mt-2 text-gray-800 font-semibold">À partir de : 200MAD</p>
                        <p class="mt-2 text-gray-800 font-semibold">Les places Disponible : {{$event->places_Disponible}}</p>

                        <div class="flex items-center gap-2">
                            @if($event->date->isPast())
                                <button  type="button" class="mt-4  focus:outline-none focus:ring-4 focus:ring-green-300 font-medium text-white rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600" disabled>Guichet Fermé</button>
                            @else
                                <form action="{{route("reserve.event")}}" method="post">
                                    @csrf
                                    <input type="hidden" name="titre" value="{{$event->titre}}">
                                    <input type="hidden" name="lieu" value="{{$event->lieu}}">

                                    <input type="hidden" value="{{ $event->id }}" name="event_id">
                                    <button type="submit" class="mt-4 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium text-white rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Buy</button>
                                </form>
                            @endif


                            <form class="relative top-2" action="{{ route('home.show', ['home' => $event->id]) }}" method="GET">
                                <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Details</button>
                            </form>

                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

{{--        <div class="mt-8 flex justify-center">--}}
{{--            {{ $events->links() }}--}}
{{--        </div>--}}

    </section>

    <section  class="pb-20 md:pb-20 w-full bg text-white space-y-8">
            <div class="space-y-6 pt-8">
                <h1 class="text-center text-4xl font-bold">les événements passés</h1>
                <p class="text-center">Tout ce que vous avez raté sur GUICHET</p>
            </div>

            <div class="container mx-auto w-full h-auto grid grid-cols-1 md:grid-cols-4 gap-4">


                @foreach($events as $event)
                    @if($event->date->isPast())
                        <div class="card bg-white border-gray-200 w-[300px] bg-opacity-50  shadow-lg rounded-lg overflow-hidden">
                            <img src="{{$event->getFirstMediaUrl('eventImage')}}" alt="image" class="w-full object-cover">
                            <div class="p-4">
                                <span class="inline-block mt-1 bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Concerts & Festivals</span>
                                <h1 class="mt-2 font-bold text-lg text-gray-900">Nostalgia à Rabat</h1>
                                <h3 class="text-sm text-gray-600">Rabat, PALAIS DES CONGRÈS Rabat</h3>
                                <p class="mt-2 text-gray-800 font-semibold">À partir de : 200MAD</p>
                                <button class="mt-4  focus:outline-none focus:ring-4 focus:ring-green-300 font-medium text-white rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 ">Guichet Fermé</button>
                                <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Details</button>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </section>

    <section class="mt-8 mb-4">
        <div class="container mx-auto w-full space-y-4">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-3xl font-bold">Encore plus de nouveautés</h1>
                <p class="text-xl">Toutes les ventes d'aujourd'hui</p>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center md:space-x-4">
                <div class="flex flex-col items-center justify-center  p-4 text-center space-y-2 w-full md:w-1/3">
                    <img src="{{asset('garantie.png')}}" alt="Notre garantie 100%" class="max-w-full h-auto">
                    <h1 class="text-2xl font-bold">Notre garantie 100 %</h1>
                    <p class="text-sm">Éliminez les risques et assurez-vous une transaction sécurisée et protégée en faisant affaire avec guichet.com</p>
                </div>

                <div class="flex flex-col items-center justify-center  p-4 text-center space-y-2 w-full md:w-1/3">
                    <img src="{{asset('ticket.png')}}" alt="Ticket" class="max-w-full h-auto">
                    <h1 class="text-2xl font-bold">Achetez des tickets</h1>
                    <p class="text-sm">Achetez des tickets de qualité pour les meilleurs événements en toute sécurité !</p>
                </div>

                <div class="flex flex-col items-center justify-center  p-4 text-center space-y-2 w-full md:w-1/3">
                    <img src="{{asset('support.png')}}" alt="Support" class="max-w-full h-auto">
                    <h1 class="text-2xl font-bold">Support 24/24H</h1>
                    <p class="text-sm">+212 6 45 765 765 / sav@guichet.ma</p>
                </div>
            </div>

        </div>
    </section>

    @include("components.footer")

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>
