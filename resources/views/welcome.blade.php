<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FC Riviera - Intranet</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.js" integrity="sha512-CABi9vrtlQz9otMo5nT0B3nCBmn5BirYvO3oCnulsEzRDekxdMEZ2rXg85Is5pdnc9HNAcUEjm/7HagpqAFa1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="http://intranet.fcriviera.ch/images/logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FC Riviera | Risultati in diretta</span>
            </a>
        </div>
    </nav>
    <main class="container mx-auto my-8 p-4" id="gameContainer">
        @foreach ($partite as $partita)
            @php
                $date = $partita->data_partita;
                $current_time = time();

                if(strtotime($date) < $current_time) {
                    $min =  'LIVE';
                } else {
                    $min =  date('H:i', strtotime($date));
                }
            @endphp
            <div class="grid grid-cols-3 bg-white rounded-md shadow-md rounded-md" style="grid-template-columns: 1fr 4fr 0.5fr;">
                <div class="bg-gray-100 p-4 flex items-center justify-center rounded-md" id="goalDiv{{$partita->id}}">
                    <h2 class="text-lg font-bold mb-2">{{$min}}</h2>
                </div>
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-2">{{ $partita->casa }}</h2>
                    <h2 class="text-lg font-bold mb-2">{{ $partita->trasferta }}</h2>
                </div>
                <div class="p-4 flex flex-end flex-col">
                    <h2 class="text-lg font-bold mb-2" id="goalHome{{ $partita->id }}">{{ $partita->punti_casa}}</h2>
                    <h2 class="text-lg font-bold mb-2" id="goalAway{{ $partita->id }}">{{ $partita->punti_trasferta }}</h2>
                </div>
            </div><br>
        @endforeach
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>