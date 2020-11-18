@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Jongeren Bewerken') }}</div>

                    <div class="card-body">
                        <form action="{{ route('jongeren.update', $jong->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="id" value="{{$jong->id}}">
                                <div class="col-md-6 mb-3">
                                    <label for="naam">Naam</label>
                                    <input type="text" name="naam" class="form-control" value="{{$jong->naam}}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="geboortedatum">Geboortedatum</label>
                                    <input type="date"  name="geboortedatum" class="form-control" value="{{$jong->geboortedatum}}"required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="straat">Straat</label>
                                    <input type="text" name="straat" class="form-control" value="{{$jong->straat}}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" name="postcode" class="form-control" value="{{$jong->postcode}}" >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="woonplaats">Woonplaats</label>
                                    <input type="text" name="woonplaats" class="form-control" value="{{$jong->woonplaats}}">
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
