
@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <form method="post" action="{{ route('books.store') }}">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input class="form-control" name="author">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
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
                    <td>del</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection