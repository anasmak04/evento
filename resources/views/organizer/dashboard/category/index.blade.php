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
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3 px-6">Event ID</th>
                                <th scope="col" class="py-3 px-6">Event Name</th>
                                <th scope="col" class="py-3 px-6">status</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr class="bg-white border-b">
                                    <td class="py-4 px-6">{{ $category->id }}</td>
                                    <td class="py-4 px-6">{{ $category->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
