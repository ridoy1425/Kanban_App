<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .kanban_area {
            margin-top: 20px;
            text-align: center;
        }

        .add_task {
            margin-bottom: 20px;
        }

        .add_task input {
            height: 47px;
            width: 30%;
            padding-left: 10px;
        }

        .add_task button {
            color: #FF6347;
            padding: 10px 25px;
        }

        .box {
            border: 1px groove black;
            height: 500px;
            text-align: center;
            overflow: auto;
        }

        .box h4 {
            padding: 10px;
            background-color: #FF6347;
            border-bottom: 1px solid black;
        }

        .card {
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="kanban_area">
        <div class="container">
            <div class="alert">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0rem;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-success" role="success">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger" role="success">
                    {{ Session::get('error') }}
                </div>
                @endif
            </div>
            <div class="add_task">
                <form action="/store" method="post">
                    @csrf
                    <input type="text" name="task_name" placeholder="Write Your Task ..." required>
                    <button type="submit">Add</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <h4>To Do</h4>
                        @foreach($tasks as $task)
                        @if($task->task_category == 1)
                        <div class="card mb-2" style="width: 18rem;">
                            <div class="p-1">
                                <h5 class="card-title">{{$task->task_name}}</h5>
                                <div>
                                    <a href="{{route('progress',$task->id)}}" class="btn btn-info">In Progress</a>
                                    <a href="{{route('task_done',$task->id)}}" class="btn btn-primary">Done</a>
                                    <a href="{{route('delete',$task->id)}}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <h4>In Progress</h4>
                        @foreach($tasks as $task)
                        @if($task->task_category == 2)
                        <div class="card mb-2" style="width: 18rem;">
                            <div class="p-1">
                                <h5 class="card-title">{{$task->task_name}}</h5>
                                <div>
                                    <a href="{{route('todo',$task->id)}}" class="btn btn-info">To Do</a>
                                    <a href="{{route('task_done',$task->id)}}" class="btn btn-primary">Done</a>
                                    <a href="{{route('delete',$task->id)}}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <h4>Done</h4>
                        @foreach($tasks as $task)
                        @if($task->task_category == 3)
                        <div class="card mb-2" style="width: 18rem;">
                            <div class="p-1">
                                <h5 class="card-title">{{$task->task_name}}</h5>
                                <div>
                                    <a href="{{route('todo',$task->id)}}" class="btn btn-info">To Do</a>
                                    <a href="{{route('progress',$task->id)}}" class="btn btn-info">In Progress</a>
                                    <a href="{{route('delete',$task->id)}}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>