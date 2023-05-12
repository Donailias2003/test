@section('content')
    @if(Session::has('terminata'))
        <div class="alert alert-success">
            {{ Session::get('terminata') }}
        </div>
    @endif
    @if ($partite != null)
        @foreach ($partite as $partita)
        <div class="card mb-3">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">{{ $partita->casa }} vs {{ $partita->trasferta }} ({{ $partita->punti_casa }} - {{ $partita->punti_trasferta}})</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $partita->casa }} vs {{ $partita->trasferta }}</h6>
                            <p class="card-text">Luogo: {{ $partita->campo }}</p>
                            <p class="card-text">Data e ora: {{ $partita->data_partita }}</p>
                        </div>
                        <div class="col-md-7">
                            <form method="post">
                                @csrf
                                <div class="row mb-3 flex">
                                    <input type="hidden" value="{{ $partita->id }}" name="id" id="">
                                    <div class="col-md-6">
                                        <label for="result-a" class="form-label">Risultato Squadra A</label>
                                        <input type="number" name="punti_casa" min="0"
                                            value="{{ $partita->punti_casa }}" class="form-control" id="result-a"
                                            placeholder="Inserisci il risultato">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="result-b" class="form-label">Risultato Squadra B</label>
                                        <input type="number" name="punti_trasferta" min="0"
                                            value="{{ $partita->punti_trasferta }}" class="form-control" id="result-b"
                                            placeholder="Inserisci il risultato">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="scorers" class="form-label">Marcatore</label>
                                    <input list="all-marcatori" name="marcatore" class="form-control" id="scorers"
                                        placeholder="Marcatore" 
                                    />
                                </div>
                                    <datalist id="all-marcatori">
                                        @foreach ($marcatori as $marcatore)
                                            <option value="{{$marcatore->nome}}">Goal: {{$marcatore->goal}}</option>
                                        @endforeach
                                    </datalist>
                                <div class="d-grid gap-2">
                                    @if (!$partita->terminata)
                                        <a href="risultati/termina/{{$partita->id}}" class="btn btn-danger">Termina</a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Salva</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
    @else
        <div class="bg-gray-100 p-4">
            <p class="text-gray-500 font-medium text-center">Non ci sono partite registrate al momento.</p>
        </div>
    @endif
@endsection
@extends(backpack_view('blank'))
