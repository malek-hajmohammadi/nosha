@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>mountains</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($mountains as $mountain)
                        <tr>
                            <td>{{ $mountain->name }}</td>
                            <td>{{ $mountain->description }}</td>
                            <td>
                                <a href="{{ route('mountains.show', $mountain->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('mountains.edit', $mountain->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('mountains.destroy', $mountain->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('mountains.create') }}" class="btn btn-success">Add
@endsection
