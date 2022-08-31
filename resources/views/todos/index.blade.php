@extends('master')
@section('title')
    Todos Lists
@endsection
@section('content')
            <h1 class="text-center py-5">TODOS</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card border-primary">
                                <div class="card-header bg-warning text-center">
                                    Tasks List
                                </div>
                                <div class="card-body">
                                     <ul class="list-group">
                                             @foreach ($todos as $todo)
                                             @if (!$todo->completed)
                                                <li class="list-group-item list-group-item-action">
                                                    {{ $todo->name }}
                                                    <a href="" class="btn btn-danger btn-sm float-right ml-2 "  onclick="deleteTodo({{ $todo->id }})">Delete
                                                    <form action="{{ route('delete-todo',['id' =>  $todo->id]) }}" method="POST" id="deleteTodo{{ $todo->id }}">
                                                        @csrf
                                                    </form>
                                                    </a>
                                                    <a href="{{ route('complete-todo', ['id' => $todo->id ]) }}" class="btn btn-warning btn-sm ml-2 float-right">Complete</a>
                                                    <a href="{{ route('edit-todo', ['id' => $todo->id ]) }}" class="btn btn-primary btn-sm float-right  ml-2">View</a>
                                                </li>
                                             @endif
                                             @endforeach
                                         </ul>
                                </div>
                            </div>
                </div>
            </div>

    <script>
        function deleteTodo($id)
        {
            event.preventDefault();
           var check = confirm('Are you sure to delete this');
           if(check)
           {
               document.getElementById('deleteTodo'+ $id).submit();
           }

        }
    </script>

@endsection
