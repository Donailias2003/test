<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FC Riviera - TV</title>
  <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-zuV7BZwN70uTws/UbnzddxdpT7X+Tuy/vbZs+QKWaEIB+1KjGPlJY3Dq3BxNSW2QXfKh+MktpZvMDENRrWJH+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  

  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-start items-center justify-start p-4">
      <a href="https://flowbite.com/" class="flex items-start">
          <img src="/images/logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FC Riviera | TV</span>
      </a>
    </div>
  </nav><hr>
  <div id="content-div">
    <div class="flex justify-center items-center h-screen">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="/tv/login">
          @csrf
          <h2 class="text-xl font-bold mb-4 text-center">Connetti TV</h2>
          <div class="mb-4 flex justify-center">
            <div class="mr-2">
              <input class="shadow appearance-none border rounded py-2 px-1 text-gray-700 leading-tight focus:text-center focus:shadow-outline" name="char1" id="char1" type="text" >
            </div>
            <div class="mr-2">
              <input class="shadow appearance-none border rounded py-2 px-1 text-gray-700 leading-tight focus:text-center focus:shadow-outline" name="char2" id="char2" type="text" >
            </div>
            <div class="mr-2">
              <input class="shadow appearance-none border rounded py-2 px-1 text-gray-700 leading-tight focus:text-center focus:shadow-outline" name="char3" id="char3" type="text">
            </div>
            <div class="mr-2">
              <input class="shadow appearance-none border rounded py-2 px-1 text-gray-700 leading-tight focus:text-center focus:shadow-outline" name="char4" id="char4" type="text">
            </div>
          </div>
          <div class="flex items-center justify-center">
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Connetti" />
          </div>
        </form>
      </div>
      
  </div>
</body>
</html>
