@extends(backpack_view('blank'))
@section('content')
    <h1>Benvenuto {{backpack_user()->name}},</h1>
    <div class="row">
        @hasrole('Amministratore')
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Gestione Utenti</h5>
              <p class="card-text">Aggiungi, modifica o elimina gli utenti del sistema.</p>
              <a href="user" class="btn btn-primary">Vai alla gestione utenti</a>
            </div>
          </div>
        </div>
        @endhasrole
        @can('Gestisci risultati')
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Gestione Risultati</h5>
              <p class="card-text">Aggiungi, modifica o elimina i risultati in diretta.</p>
              <a href="risultati" class="btn btn-primary">Vai ai Risultati</a>
            </div>
          </div>
        </div>
        @elsecan('Visualizza partite')
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Gestione Partite</h5>
              <p class="card-text">Visualizza, modifica e aggiungi le partite.</p>
              <a href="partita" class="btn btn-primary">Vai a Partite</a>
            </div>
          </div>
        </div>
        @elsecan('create')
        <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Gestione TV</h5>
                <p class="card-text">Scegli cosa visualizzare in /tv.</p>
                <a href="tvmanager" class="btn btn-primary">Vai a TV</a>
              </div>
            </div>
          </div>
          @endcan
      </div>
      
@endsection
