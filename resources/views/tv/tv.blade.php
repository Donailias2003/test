<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FC Riviera - Results</title>
  <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-zuV7BZwN70uTws/UbnzddxdpT7X+Tuy/vbZs+QKWaEIB+1KjGPlJY3Dq3BxNSW2QXfKh+MktpZvMDENRrWJH+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  

  <nav class="bg-white border-gray-200 dark:bg-gray-900 w-screen">
    <div class="max-w-max-xl flex items-center justify-between p-4">
      <a href="/tv/disconnect" class="flex items-start">
          <img src="/images/logo.png" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FC Riviera | TV</span>
      </a>
      <div class="flex items-end">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.348 14.651a3.75 3.75 0 010-5.303m5.304 0a3.75 3.75 0 010 5.303m-7.425 2.122a6.75 6.75 0 010-9.546m9.546 0a6.75 6.75 0 010 9.546M5.106 18.894c-3.808-3.808-3.808-9.98 0-13.789m13.788 0c3.808 3.808 3.808 9.981 0 13.79M12 12h.008v.007H12V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>        
      </div>
    </div>
  </nav><hr>
  <div id="content-div" class="image" style="background-image: url('/uploads/default.png')">
  </div>
  
          
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('9b130728ae2481599811', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('play-media', function(data) {
      let content = null;
      if (data.type == 'image') {
        $('#content-div').empty();
        $('#content-div').css("background-image", "none");
        $('#content-div').append(`<img id="subcontent-div" class="image" src="\\uploads${data.src}">`);
      }else if (data.type == 'risultati') {
          $('#content-div').css("background-image", "none");
          $.ajax({
          url: '/api/partite',
          method: 'GET',
          success: function(response) {
              response = JSON.parse(response);
              $('#content-div').empty();
              $('#content-div').prepend(`<h1 class="text-3xl font-bold">Risultati in diretta</h1><br/>`);
              response.forEach(partita => {
                  $('#content-div').append(`<div id="divGame${partita.id}" class="bg-white rounded-lg shadow-lg overflow-hidden">
                      <div class="p-6">
                      <div class="flex justify-between items-center">
                          <div class="text-gray-700 font-bold text-lg">${partita.casa}</div>
                          <div class="text-gray-700 font-bold text-lg"><span id="puntCasa${partita.id}">${partita.punti_casa}</span></div>
                      </div>
                      <div class="flex justify-between items-center mt-4">
                          <div class="text-gray-700 font-bold text-lg">${partita.trasferta+`</div>
                          <div class="text-gray-700 font-bold text-lg"><span id="puntTrasferta${partita.id}">`+partita.punti_trasferta}</span></div>
                      </div>
                      </div>
                  </div>
                  <br>`);
              });
              $('#content-div').addClass('p-4');
          }
          });
        }else if (data.type == 'marcatori') {
          $('#content-div').css("background-image", "none");
          $.ajax({
          url: '/api/marcatori',
          method: 'GET',
          success: function(response) {
              response = JSON.parse(response);
              $('#content-div').empty();
              $('#content-div').prepend(`<h1 class="text-3xl font-bold">Classifica Marcatori.</h1><br/><table class="table-auto border-collapse w-full">
                <thead>
                  <tr class="bg-gray-100">
                    <th class="py-2 px-4 text-left text-gray-700">ID</th>
                    <th class="py-2 px-4 text-left text-gray-700">Giocatore</th>
                    <th class="py-2 px-4 text-left text-gray-700">Goal</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="marcatori-put">`);
              response.forEach(marcatore => {
                  $('#marcatori-put').append(`<tr class="bg-white">
                    <td class="py-2 px-4">${marcatore.id}</td>
                    <td class="py-2 px-4">${marcatore.nome}</td>
                    <td class="py-2 px-4">${marcatore.goal}</td>
                  </tr>`);
              });
              $('#content-div').append(`</tbody></table>`);
              $('#content-div').addClass('p-4');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
          });
        }else if (data.type == 'votazioni') {
          setVotazioni();
        }
    });
    channel.bind('my-event', function(data) {
      $('#puntCasa'+data.id).text(data.punti_casa);
      $('#puntTrasferta'+data.id).text(data.punti_trasferta);
      //$('#divGame'+data.id).css('background-color', 'green');
      $('#divGame'+data.id).prepend(`<div id="goalBanner" style="background-color:green;">GOALLLLLLLL</div>`);
      setTimeout(() => {
        //$('#divGame'+data.id).css('background-color', 'white');
        $('#goalBanner').remove();
      }, 5000);
    });
    channel.bind('new-vote', function(data) {
      setVotazioni();
    });


    function setVotazioni(){
      $('#content-div').css("background-image", "none");
          $.ajax({
          url: '/api/votazioni',
          method: 'GET',
          success: function(response) {
              response = JSON.parse(response);
              $('#content-div').empty();
              $('#content-div').prepend(`<h1 class="text-3xl font-bold">Classifica Marcatori.</h1><br/><table class="table-auto border-collapse w-full">
                <thead>
                  <tr class="bg-gray-100">
                    <th class="py-2 px-4 text-left text-gray-700">ID</th>
                    <th class="py-2 px-4 text-left text-gray-700">Giocatore</th>
                    <th class="py-2 px-4 text-left text-gray-700">Voti</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="marcatori-put">`);
              response.forEach(giocatore => {
                  $('#marcatori-put').append(`<tr class="bg-white">
                    <td class="py-2 px-4">${giocatore.id}</td>
                    <td class="py-2 px-4">${giocatore.cognome} ${giocatore.nome}</td>
                    <td class="py-2 px-4">${giocatore.voti}</td>
                  </tr>`);
              });
              $('#content-div').append(`</tbody></table>`);
              $('#content-div').addClass('p-4');
          }
          });
    }
  </script>
  <style>
    img.insert{
        text-align: center;
        max-height:93vh;
    }
    #content-div.image{
      height: 93vh;
      width: 100vw;
      background-size: cover;
      background-position: center; 
    }
    #subcontent-div.image{
      height: 93vh;
      margin: 0 auto;
    }
  </style>
</body>
</html>
