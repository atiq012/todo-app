@extends('layouts.app')

@section('title')
Todo List
@endsection

@section('content')

    <h1 class="text-center my-5">Todos page</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-defaul">
                    <div class="card-header">
                        Todos
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $item)
                                <li class="list-group-item">               
                                    {{$item->name}}
                                    @if(!$item->completed)
                                    <a href="/todos/{{$item->id}}/complete" style="color:white" class="btn btn-warning btn-sm float-right ml-2">Complete</a>
                                    @endif
                                    <a href="/todos/{{$item->id}}" class="btn btn-primary btn-sm float-right">View</a>                                  
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
@endsection