<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: Inter;
            }
        </style>
    </head>
    <body class="antialiased">
       <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                RSS Reader App
            </h2>

            <form action="{{ url('store') }}" method="post">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold">XML URL</span>
                        <input type="text" name="filename" class="block w-full mt-1 text-sm
focus:border-purple-400 focus:outline-none focus:shadow-outline-purple apperance-none bg-white border border-gray-200 rounded-md px-3 py-2 leading-6"
                            placeholder="XML URL" required >
                    </label>
                    <div class="mt-4">
                       <button class="px-5 py-3 font-medium leading-5 text-sm text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Submit </button>
                    </div>
                </div>
            </form>

            <!-- New Table -->
            <div class="w-full overflow-hidden border border-gray-200 rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50 ">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Link</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                           @foreach($table_data as $data)
                                <tr class="text-sm font-medium">
                                    <td class="px-4 py-3">{{ $data->id }}</td>
                                    <td class="px-4 py-3">{{ $data->title }}</td>
                                    <td class="px-4 py-3">{{ $data->link }}</td>
                                    <td class="px-4 py-3"><a href="{{ url('view/'.$data->id) }}" target="_blank" class="px-4 py-2 text-xs text-white bg-blue-700 hover:bg-blue-500 rounded-md">view</td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </main>
    </body>
</html>
