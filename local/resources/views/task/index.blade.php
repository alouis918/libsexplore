@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i>Add Task</button>
                </div>
            </div>
        </form>
    </div>

    @if(count($tasks)>0)
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Tasks</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Id</th>
                            <th>Task</th>
                            <th>User</th>
                            <th>Comment</th>
                            <th>Priority</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div><a href="{{url('/task/view/'.$task->id)}}">{{$task->id}}</a></div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$task->name}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ Auth::user()->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$task->comment}}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$task->priority}}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$task->progress}}"
                                                     aria-valuemin="0" aria-valuemax="100" style="width:{{$task->progress}}%">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{$task->status == 1 ? "Done" :"In progress"}}</div>
                                    </td>
                                    <td>
                                        <form action="{{url('task/'.$task->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" type="submit" id="delete-task-{{$task->id}}">
                                                <i class="fa fa-btn fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

    @endif
@endsection
