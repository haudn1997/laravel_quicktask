@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        {{Form::open(['route'=>'task','method'=>'POST','class'=>'form-horizontal'])}}
            <div class="form-group">
                {{Form::label('task', trans('message.task'), ['class' => 'col-sm-3 control-label'])}}

                <div class="col-sm-6">
                    {{Form::text('name','',['class' => 'form-control', 'id' => 'task-name'])}}
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {{Form::submit(trans('message.Add_task'),['class' => 'btn btn-default btn-success'])}}
                </div>
            </div>
        {{Form::close()}}
    </div>

     @if (count($tasks))
        <div class="panel panel-default">
            <div class="panel-heading">
                {{trans('meassge.Current_Tasks')}}
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>{{trans('message.task')}}</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                                <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                {!! Form::open(['routes' => ['/task', $task->id],'method' => 'POST']) !!}
                                    {{ Form::submit('Delete'); }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection


