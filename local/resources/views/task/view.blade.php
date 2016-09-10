@extends('layouts.app')
@section('title')
    Task View
@endsection
@section('content')
    @if($task)
        @include('common.errors')
        <form action="{{url('/task/view/'.$task->id.'/update')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="task-id" class="col-sm-3 control-label">Task Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="task-id" class="form-control" disabled value="{{$task->id}}">
                </div>
            </div>
            <div class="form-group">
                <label for="task-user" class="col-sm-3 control-label">Task User</label>
                <div class="col-sm-6">
                    <input type="text" name="user" id="task-user" disabled class="form-control"  value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task" class="form-control"  value="{{ $task->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="priority" class="col-sm-3 control-label"> Priority</label>
                <div class="col-sm-6">
                <select class="form-control"  name="priority" id="priority">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option value="{{$task->priority}}" selected>{{$task->priority}}</option>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="progress" class="col-sm-3 control-label">Progress</label>
                <div class="col-sm-6">
                    <input type="text" name="progress" id="progress" class="form-control"  value="{{ $task->progress }}">
                </div>
            </div>

            <div class="form-group">
                <label for="comment" class="col-sm-3 control-label"> Comment</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="comment" rows="3" id="comment">{{$task->comment}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>Edit Task</button>
                </div>
            </div>
        </form>

    @else
    There is no task with these id
    @endif

@endsection