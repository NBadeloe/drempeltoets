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
                                <th scope="col">Naam</th>
                                <th scope="col">Geboortdatum</th>
                                <th scope="col">Straat</th>
                                <th scope="col">Postcode</th>
                                <th scope="col">Woonplaats</th>
                                <th scope="col"><a class=" btn btn-outline-success" href="{{ route('jongeren.create') }}">Toevoegen</a>
                                    <a class="btn btn-outline-success" href="{{ route('jongeren.export') }}">Export</a> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jongeren as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->naam }}</td>
                                    <td>{{ $value->geboortedatum }}</td>
                                    <td>{{ $value->straat }}</td>
                                    <td>{{ $value->postcode }}</td>
                                    <td>{{ $value->woonplaats }}</td>


                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>

                                        <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->

                                        <a class="btn btn-small btn-outline-success" href="{{ route('jongeren.edit', $value->id) }}">Bewerken</a>
                                        <form action="{{ route('jongeren.destroy', $value->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-small btn-outline-success" type="submit">Verwijderen</button>
                                        </form>

                                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
@endsection
