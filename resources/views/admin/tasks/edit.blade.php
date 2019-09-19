@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tasks.update", [$task->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('project_name_id') ? 'has-error' : '' }}">
                <label for="project_name">{{ trans('cruds.task.fields.project_name') }}*</label>
                <select name="project_name_id" id="project_name" class="form-control select2" required>
                    @foreach($project_names as $id => $project_name)
                        <option value="{{ $id }}" {{ (isset($task) && $task->project_name ? $task->project_name->id : old('project_name_id')) == $id ? 'selected' : '' }}>{{ $project_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_name_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_name_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('task_name') ? 'has-error' : '' }}">
                <label for="task_name">{{ trans('cruds.task.fields.task_name') }}*</label>
                <input type="text" id="task_name" name="task_name" class="form-control" value="{{ old('task_name', isset($task) ? $task->task_name : '') }}" required>
                @if($errors->has('task_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('task_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.task_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('assign_to') ? 'has-error' : '' }}">
                <label for="assign_to">{{ trans('cruds.task.fields.assign_to') }}</label>
                <input type="text" id="assign_to" name="assign_to" class="form-control" value="{{ old('assign_to', isset($task) ? $task->assign_to : '') }}">
                @if($errors->has('assign_to'))
                    <em class="invalid-feedback">
                        {{ $errors->first('assign_to') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.assign_to_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('main_days') ? 'has-error' : '' }}">
                <label for="main_days">{{ trans('cruds.task.fields.main_days') }}</label>
                <input type="number" id="main_days" name="main_days" class="form-control" value="{{ old('main_days', isset($task) ? $task->main_days : '') }}" step="1">
                @if($errors->has('main_days'))
                    <em class="invalid-feedback">
                        {{ $errors->first('main_days') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.main_days_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection