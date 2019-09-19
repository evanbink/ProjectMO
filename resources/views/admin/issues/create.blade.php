@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.issue.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.issues.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('projects_name_id') ? 'has-error' : '' }}">
                <label for="projects_name">{{ trans('cruds.issue.fields.projects_name') }}*</label>
                <select name="projects_name_id" id="projects_name" class="form-control select2" required>
                    @foreach($projects_names as $id => $projects_name)
                        <option value="{{ $id }}" {{ (isset($issue) && $issue->projects_name ? $issue->projects_name->id : old('projects_name_id')) == $id ? 'selected' : '' }}>{{ $projects_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('projects_name_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('projects_name_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                <label for="desc">{{ trans('cruds.issue.fields.desc') }}*</label>
                <input type="text" id="desc" name="desc" class="form-control" value="{{ old('desc', isset($issue) ? $issue->desc : '') }}" required>
                @if($errors->has('desc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('desc') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.issue.fields.desc_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">
                <label for="priority">{{ trans('cruds.issue.fields.priority') }}*</label>
                <select id="priority" name="priority" class="form-control" required>
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Issue::PRIORITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('priority', 'Select Priority') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('priority'))
                    <em class="invalid-feedback">
                        {{ $errors->first('priority') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection