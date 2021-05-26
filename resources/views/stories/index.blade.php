
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Stories
                <a href="{{ route('stories.create') }} " style="float:right;">Create story</a>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stories as $story)
                            <tr>
                                <td>{{ $story->title }} </td>
                                <td>{{ $story->body }} </td>
                                <td>{{ $story->type }} </td>
                                <td>{{ $story->status }} </td>
                                <td>
                                    <a href="{{ route('stories.edit', [$story] ) }}" class="btn btn-secondary"> Edit </a>
                                    <form action="{{ route('stories.destroy', [$story]) }} " method="POST" style="display: inline-block;">
                                        {{ @csrf_field() }}
                                        @method('DELETE')

                                        <button type='submit' class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection













