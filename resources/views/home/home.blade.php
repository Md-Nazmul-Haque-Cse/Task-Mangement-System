@extends('master')

@section('title')
    Create a new Todos
@endsection

@section('content')
    <h1 class="text-center my-5">CREATE A NEW TASK</h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">
                <div class="card-header bg-info"></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('store-todo') }}" method="post">
                        @csrf
                         <div class="ml-2">
                             <input type="text"  name="name" placeholder="Write Your Task" value="">
                             <span class="ml-2">
                         <button type="submit" class="btn-success">Add</button>
                         </span>
                         </div>
                    </form>
                </div>
            </div>
        </div>
            <div class="col-md-4 py-5">
                <div class="card border-primary">
                    <div class="card-header bg-info text-center">
                        To Do
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $todo)
                                @if (!$todo->completed)
                                    <li class="list-group-item list-group-item-action">
                                        {{ $todo->name }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                </div>
            <div class="col-md-4 py-5">
                <div class="card border-primary">
                    <div class="card-header bg-warning text-center">
                       In Progess
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
                                        <a href="{{ route('edit-todo', ['id' => $todo->id ]) }}" class="btn btn-primary btn-sm float-right  ml-2">View</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                </div>
            <div class="col-md-4 py-5">
                <div class="card border-primary">
                    <div class="card-header bg-success text-center">
                       Done
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $todo)
                                @if (!$todo->completed)
                                    <li class="list-group-item list-group-item-action">
                                        {{ $todo->name }}
                                        <a href="{{ route('complete-todo', ['id' => $todo->id ]) }}" class="btn btn-success btn-sm ml-2 float-right">Done</a>
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
