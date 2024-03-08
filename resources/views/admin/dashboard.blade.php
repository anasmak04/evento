<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include('components.header')
{{-- @include('layouts.nav') --}}
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

@include('components.asideadmin')

<div class="p-4 sm:ml-64 bg-[#eceef2]">
    <div class="p-4 border-2 border-gray-300 border-dashed rounded-lg">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="font-bold text-3xl mb-5 ml-4 text-gray-700">Statistics</h1>

            <div class="relative p-4 overflow-x-auto sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <canvas id="myChart" style="width: 20px; height: 5px"></canvas>
                    </div>

                    <!-- statistic of the Events -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">5</h1>
                        <span>Reservation</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Reservations</a>
                    </div>
                    <!-- statistic of the wikis -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_events }}</h1>
                        <span>Event</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Events</a>
                    </div>
                    <!-- statistic of the users -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_users }}</h1>
                        <span>User</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Users</a>
                    </div>




                    <!-- statistic of the categories -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_categories }}</h1>
                        <span>Category</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Categories</a>
                    </div>




                </div>
            </div>

        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users', 'categories', 'events'],
            datasets: [{
                label: '#',
                data: [{{$total_users}}, {{$total_categories}}, {{$total_events}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
