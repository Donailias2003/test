<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FC Riviera - Vota</title>
  <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-zuV7BZwN70uTws/UbnzddxdpT7X+Tuy/vbZs+QKWaEIB+1KjGPlJY3Dq3BxNSW2QXfKh+MktpZvMDENRrWJH+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  

  <nav class="bg-white border-gray-200 dark:bg-gray-900 w-screen">
    <div class="max-w-max-xl flex items-center justify-between p-4">
      <a href="votazioni" class="flex items-start">
          <img src="/images/logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FC Riviera | Votazioni</span>
      </a>
    </div>
  </nav><hr>
  @if (!$serverStatus->status)
  <br>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
      <div class="md:flex-shrink-0 bg-red-500">
        &nbsp;&nbsp;&nbsp;
      </div>
      <div class="p-8">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Attenzione!</div>
        <p class="mt-2 text-gray-500">Le votazioni sono chiuse in questo momento.</p>
        <div class="mt-4">
        </div>
      </div>
    </div>
  </div>
  @elseif (Session::get('voted'))
    <br>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
      <div class="md:flex">
        <div class="md:flex-shrink-0">
          <img class="h-48 w-full object-cover md:w-48" src="https://ih1.redbubble.net/image.2032957463.5722/st,small,845x845-pad,1000x1000,f8f8f8.jpg" alt="Placeholder image">
        </div>
        <div class="p-8">
          <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Attenzione!</div>
          <p class="mt-2 text-gray-500">Hai già votato per questo elemento.</p>
          <div class="mt-4">
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="grid grid-cols-1 gap-4 p-4">
      @foreach ($giocatori as $giocatore)
          <div class="grid grid-cols-1 gap-6">
              <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-medium mb-2">{{$giocatore->cognome}} {{$giocatore->nome}}</h2>
                <p class="text-gray-600">Squadra: {{$giocatore->squadra}}</p>
                <p class="text-gray-600">Numero: {{$giocatore->numero}}</p>
                <p class="text-gray-600">Voti: {{$giocatore->voti}}</p><br>
                <a href="vota/{{$giocatore->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Vota</a>
              </div>
          </div>
      @endforeach
    </div>
  @endif
</body>
</html>
