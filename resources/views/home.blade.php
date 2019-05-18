
@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <book-form>@crsf</book-form>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Delete</th>
            <tr>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>
                        <form method="post" action="{{ route('books.destroy', $book->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection