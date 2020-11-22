@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('Nieuwe koppel toevoegen') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('koppel.store') }}" >
                            @csrf
                            @method('post')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="activiteit">Activiteit</label>
                                    <select name="activiteiten" id="activiteit" class="form-control">
                                        @foreach($activiteiten as $value)
                                        <option>{{$value->omschrijving}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="jongeren">Jongeren</label>
                                    <select name="jongeren" id="jongeren" class="form-control">
                                        @foreach($jongeren as $value)
                                            <option>{{$value->naam}}</option>
                                        @endforeach
                                    </select>
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
