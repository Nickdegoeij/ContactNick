@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Make wishes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create') }}"> Create New Wish</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Plaatje</th>
            <th>URL</th>
            <th>Beschrijving</th>
            <th>Prijs</th>

        </tr>
        @foreach ($wishlist as $wish)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $wish->name }}</td>
                <td>{{ $wish->plaatje }}</td>
                <td>{{ $wish->url }}</td>
                <td>{{ $wish->beschrijving }}</td>
                <td>{{ $wish->prijs }}</td>

                <td>
                    <form action="{{ route('wishlist',$wish->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('wishlist.show',$wish->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('wishlist.edit',$wish->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $wishlist->links() !!}

@endsection
