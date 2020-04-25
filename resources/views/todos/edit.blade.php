@extends('layouts.app')

@section('title')
    Todos edit
@endsection

@section('content')
    <h1 class="text-center my-5">Todos edit</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/todos/{{$todo->id}}/update-todos" method="post">
                            @csrf
                            <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{$todo->name}}">
                            </div>
                            <div class="form-group">
                                <textarea type="text" cols="5" row="10" class="form-control" name="description">{{$todo->description}}</textarea>
                            </div>
    
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm float-left">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection