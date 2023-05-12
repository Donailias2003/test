// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('9b130728ae2481599811', {
  cluster: 'eu'
});

var channel = pusher.subscribe('my-channel');


function goal(idGame,pHome,pAway) {
    $('#goalHome'+idGame).text(pHome);
    $('#goalAway'+idGame).text(pAway);
    let tmp = $('#goalDiv'+idGame).text();
    $('#goalDiv'+idGame).empty().append('<i class="fa-sharp fa-solid fa-futbol fa-beat fa-lg"></i>');
    $('#goalDiv'+idGame).removeClass('bg-gray-100').addClass('bg-green-700');
    setTimeout(() => {
        $('#goalDiv'+idGame).empty();
        $('#goalDiv'+idGame).append( `<h2 class="text-lg font-bold mb-2">${tmp}</h2>`);
        $('#goalDiv'+idGame).removeClass('bg-green-700').addClass('bg-gray-100');
    }, 5000);
}

channel.bind('my-event', function(data) {
  goal(data.id,data.punti_casa,data.punti_trasferta)
});
