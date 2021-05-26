@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Story

                    <a href="{{ route('stories.index') }}" style="float : right"> Back </a>               
                </div>
                <div class="card-body">

                @if( $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('stories.store') }}" method="POST">
                    {{ @csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name = "title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Put your Title here." value=" {{ old('title', '') }} ">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('body', '')}}</textarea>
                    </div>
                     <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" id="exampleFormControlSelect1">
                        <option value="">--Select--</option>
                        <option value="short" {{ old('type', '') == 'short' ? 'selected' : '' }} >Short</option>
                        <option value="long"  {{ old('type', '') == 'long' ? 'selected' : '' }} >Long</option>
                        </select>
                    </div>
                    <div class="form-check">
                        <label style="display : block;">Status:</label>
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" {{ old('status', '') == '1' ? 'checked' : '' }} >
                        <label class="form-check-label" for="status">
                            True
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" {{ old('status', '') == '0' ? 'checked' : '' }} >
                        <label class="form-check-label" for="status">
                            False
                        </label>
                    </div>
                    <br>
                    
                    <button name="submit" type="submit" class="btn btn-primary mb-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection