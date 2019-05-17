
@extends('layouts.app')

@section('content')
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
                <td>del</td>
            </tr>
        @endforeach
    </table>
@endsection