@extends('layouts.index')
@section('content')
    <div class="container my-4">
        <h1 class="text-center">All Details of Books</h1>
        @if ($errors->any())
            <h4>{{ $errors->first() }}</h4>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Book Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Author</th>
                    <th scope="col">Show Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ $item->image }}" width="200px" height="200px"></td>
                        <td>
                            @forelse ($item->authors as $authitem)
                                <ul>
                                    <li> {{ $authitem->name }}</li>
                                </ul>
                            @empty
                                no author
                            @endforelse
                        </td>
                        <td><a href="{{ url('show/' . $item->id) }}"class="btn btn-primary">Show</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
