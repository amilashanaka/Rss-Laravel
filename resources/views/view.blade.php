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
        <main class="h-full overflow-y-auto" id="demo">
            <div class="container px-6 mx-auto grid">
                <div class="flex justify-start items-center space-x-4">
                     <h2 class="my-4 p-2 text-2xl font-bold leading-4 text-gray-700">
                    {{ $channel->title }}
                </h2>

                    <div id="clickbox" class="hidden">
                        <a href="{{ $channel->link }}" class="px-4 py-2 font-semibold text-white bg-blue-800 hover:bg-blue-600 cursor-pointer">Go to Website</a>
                    </div>
                </div>

                @foreach($channel->items as $item)
                    <div class="border border-gray-100 rounded-md p-4 my-4">
                        <a href="{{ $item->link }}" target="_blank"><p class="text-lg font-bold text-blue-800 mb-2 hover:underline">{{ $item->title }}</p></a>
                        <p>{!! $item->description !!}</p>
                    </div>
                @endforeach
            </div>
        </main>

        <script type="text/javascript">

            document.addEventListener('keydown', function(e){
                e.preventDefault();
                if(e.keyCode === 18){
                    var element = document.getElementById("clickbox");
                    element.classList.add("block");
                    element.classList.remove("hidden");
                }
            });

            document.addEventListener('click', function(e){
              if (!document.getElementById('clickbox').contains(e.target)){
                    var element = document.getElementById("clickbox");
                    element.classList.add("hidden");
                    element.classList.remove("block");
              }
            });
        </script>
    </body>
</html>
