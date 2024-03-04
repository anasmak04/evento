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
    @include("components.navbar");


    <section class="container mx-auto w-full mb-20">

        <h1 class="text-center">{{$event->titre}}</h1>

        <div class="grid grid-cols-1 md:grid-cols-3  w-full gap-4 text-white">
            <div class="border w-full col-span-2 ">
                <img src="https://gcdn.imgix.net/events/ranges-4.jpeg">
            </div>

            <div style="background-color: #031a37;" class="border  rounded-5xl  space-y-4 flex flex-col justify-center items-center">
                <h1 class="text-2xl font-bold">Samedi 09 Mars 2024</h1>
                <h2 class="text-lg">Institut français de Casablanca - Théâtre 121</h2>

                <form class="max-w-sm mx-auto w-full">
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Ticket </option>
                    </select>
                </form>

                <div class="flex  items-center gap-8 ">
                    <input type="text" id="" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="1" required />
                    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Green</button>
                </div>

                <p class="font-bold">Vite !! Achetez rapidement vos tickets</p>

               <div class="flex justify-center space-x-8 items-center">
                   <svg class="w-6 border rounded-full  h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                       <path fill-rule="evenodd" d="M13.1 6H15V3h-1.9A4.1 4.1 0 0 0 9 7.1V9H7v3h2v10h3V12h2l.6-3H12V6.6a.6.6 0 0 1 .6-.6h.5Z" clip-rule="evenodd"/>
                   </svg>

                   <svg class="w-6 h-6 border rounded-full   text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                       <path fill-rule="evenodd" d="M12 22a10 10 0 0 1-7.1-3A9.9 9.9 0 0 1 5 4.8C7 3 9.5 2 12.2 2h.2c2.4 0 4.8 1 6.6 2.6l-2.5 2.3a6.2 6.2 0 0 0-4.2-1.6c-1.8 0-3.5.7-4.8 2a6.6 6.6 0 0 0-.1 9.3c1.2 1.3 2.9 2 4.7 2h.1a6 6 0 0 0 4-1.1c1-.9 1.8-2 2.1-3.4v-.2h-6v-3.4h9.6l.1 1.9c-.1 5.7-4 9.6-9.7 9.6H12Z" clip-rule="evenodd"/>
                   </svg>

                   <svg class="w-6 h-6 border rounded-full text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                       <path fill-rule="evenodd" d="M22 5.9c-.7.3-1.5.5-2.4.6a4 4 0 0 0 1.8-2.2c-.8.5-1.6.8-2.6 1a4.1 4.1 0 0 0-6.7 1.2 4 4 0 0 0-.2 2.5 11.7 11.7 0 0 1-8.5-4.3 4 4 0 0 0 1.3 5.4c-.7 0-1.3-.2-1.9-.5a4 4 0 0 0 3.3 4 4.2 4.2 0 0 1-1.9.1 4.1 4.1 0 0 0 3.9 2.8c-1.8 1.3-4 2-6.1 1.7a11.7 11.7 0 0 0 10.7 1A11.5 11.5 0 0 0 20 8.5V8a10 10 0 0 0 2-2.1Z" clip-rule="evenodd"/>
                   </svg>

                   <svg class="w-6 h-6 text-gray-800 border rounded-full dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                       <path fill-rule="evenodd" d="M12.5 8.8v1.7a3.7 3.7 0 0 1 3.3-1.7c3.5 0 4.2 2.2 4.2 5v5.7h-3.2v-5c0-1.3-.2-2.8-2.1-2.8-1.9 0-2.2 1.3-2.2 2.6v5.2H9.3V8.8h3.2ZM7.2 6.1a1.6 1.6 0 0 1-2 1.6 1.6 1.6 0 0 1-1-2.2A1.6 1.6 0 0 1 6.6 5c.3.3.5.7.5 1.1Z" clip-rule="evenodd"/>
                       <path d="M7.2 8.8H4v10.7h3.2V8.8Z"/>
                   </svg>

               </div>

            </div>

            <h1>Description</h1>


        </div>

        <div class="w-full">
            <p>
                À partir de 5 ans. <br>
                Pascal Peroteau s’empare des poèmes de Desnos, La Fontaine, Prévert, Eluard… Pour ce spectacle jeune public, il a demandé à dix artistes aux univers variés de réaliser dix films d’animation illustrant chacun un poème différent. Les films créés sont projetés et bruités en direct. <br>
                “Et après c’est quoi ?”, c’est en chanson que Pascal Peroteau invente une suite aux différents poèmes. Il nous raconte par exemple ce qu’il advient du fromage dérobé par le renard ou que faire du bonheur quand on l’a attrapé ! Un spectacle cousu main concocté par trois fidèles compagnons, multi-instrumentistes et touche-à-tout ! <br>
            </p>
        </div>




    </section>
    @include("components.footer");
</body>
</html>
