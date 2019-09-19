@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timeProject.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.time-projects.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.timeProject.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($timeProject) ? $timeProject->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.timeProject.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('clients_id') ? 'has-error' : '' }}">
                <label for="clients">{{ trans('cruds.timeProject.fields.clients') }}</label>
                <select name="clients_id" id="clients" class="form-control select2">
                    @foreach($clients as $id => $clients)
                        <option value="{{ $id }}" {{ (isset($timeProject) && $timeProject->clients ? $timeProject->clients->id : old('clients_id')) == $id ? 'selected' : '' }}>{{ $clients }}</option>
                    @endforeach
                </select>
                @if($errors->has('clients_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('clients_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                <label for="start_date">{{ trans('cruds.timeProject.fields.start_date') }}*</label>
                <input type="text" id="start_date" name="start_date" class="form-control date" value="{{ old('start_date', isset($timeProject) ? $timeProject->start_date : '') }}" required>
                @if($errors->has('start_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.timeProject.fields.start_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('due_date') ? 'has-error' : '' }}">
                <label for="due_date">{{ trans('cruds.timeProject.fields.due_date') }}*</label>
                <input type="text" id="due_date" name="due_date" class="form-control date" value="{{ old('due_date', isset($timeProject) ? $timeProject->due_date : '') }}" required>
                @if($errors->has('due_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.timeProject.fields.due_date_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection