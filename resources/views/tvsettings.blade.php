@section('content')
<div class="container">
    <h1>Gestione TV</h1>
    <div class="container">
        <div class="row">
          <!-- Colonna per la TV finta -->
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <div class="card-body">
                <h5 class="card-title">TV</h5>
                <div class="card-img-top bg-light rounded p-4 text-center border">
                    <h2>24HF</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- Colonna per la selezione dei media -->
          <div class="col-md-8">
            <div class="card mb-8 box-shadow">
              <div class="card-body">
                <h5 class="card-title">Media Selector</h5>
                <form method="post" action="/admin/tvmanager/play">
                    @csrf
                  <div class="form-group">
                    <label for="mediaSelect">Seleyion a media:</label>
                    <select class="form-control" id="mediaSelect" name="mediaToPlay">
                      <option selected disabled>Seleziona il media...</option>
                      <option value="risultati">Risultati</option>
                      <option value="marcatori">Marcatori</option>
                      <option value="votazioni">Votazioni</option>
                      @foreach ($files as $file)
                        <option value="{{$file}}">File: {{$file}}</option>
                      @endforeach
                    </select>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Play" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@extends(backpack_view('blank'))
