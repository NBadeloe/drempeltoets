@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Nieuwe activiteit toevoegen') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('activiteiten.store') }}" >
                            @csrf
                            @method('post')
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="omschrijving">Omschrijving</label>
                                    <input type="text" name ="omschrijving" class="form-control"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-success" type="submit">Toevoegen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
