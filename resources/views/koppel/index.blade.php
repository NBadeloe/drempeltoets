@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">Jongeren</th>
                            <th scope="col">Activiteiten</th>

                            <th scope="col"><a class=" btn btn-outline-success" href="{{ route('koppel.create') }}">Toevoegen</a>
                                <a class="btn btn-outline-success" href="{{ route('koppel.export') }}">Export</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($koppels as $value)
                            <tr>
                                <td>{{ $value->koppel_id }}</td>
                                <td>{{ $value->naam }}</td>
                                <td>{{$value->omschrijving}}</td>




                                <td>


                                    <a class="btn btn-small btn-outline-success" href="{{ route('koppel.edit', $value->koppel_id) }}">Bewerken</a>

                                    <form action="{{ route('koppel.destroy', $value->koppel_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-small btn-outline-success" type="submit">Verwijderen</button>
                                    </form>



                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
