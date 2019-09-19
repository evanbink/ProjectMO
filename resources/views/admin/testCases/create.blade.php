@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.testCase.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.test-cases.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('test_case') ? 'has-error' : '' }}">
                <label for="test_case">{{ trans('cruds.testCase.fields.test_case') }}*</label>
                <input type="text" id="test_case" name="test_case" class="form-control" value="{{ old('test_case', isset($testCase) ? $testCase->test_case : '') }}" required>
                @if($errors->has('test_case'))
                    <em class="invalid-feedback">
                        {{ $errors->first('test_case') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.test_case_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.testCase.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($testCase) ? $testCase->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                <label for="summary">{{ trans('cruds.testCase.fields.summary') }}*</label>
                <input type="text" id="summary" name="summary" class="form-control" value="{{ old('summary', isset($testCase) ? $testCase->summary : '') }}" required>
                @if($errors->has('summary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('summary') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.summary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('steps') ? 'has-error' : '' }}">
                <label for="steps">{{ trans('cruds.testCase.fields.steps') }}*</label>
                <textarea id="steps" name="steps" class="form-control ckeditor">{{ old('steps', isset($testCase) ? $testCase->steps : '') }}</textarea>
                @if($errors->has('steps'))
                    <em class="invalid-feedback">
                        {{ $errors->first('steps') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.steps_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('data') ? 'has-error' : '' }}">
                <label for="data">{{ trans('cruds.testCase.fields.data') }}</label>
                <input type="text" id="data" name="data" class="form-control" value="{{ old('data', isset($testCase) ? $testCase->data : '') }}">
                @if($errors->has('data'))
                    <em class="invalid-feedback">
                        {{ $errors->first('data') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.data_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('expected_result') ? 'has-error' : '' }}">
                <label for="expected_result">{{ trans('cruds.testCase.fields.expected_result') }}*</label>
                <textarea id="expected_result" name="expected_result" class="form-control ckeditor">{{ old('expected_result', isset($testCase) ? $testCase->expected_result : '') }}</textarea>
                @if($errors->has('expected_result'))
                    <em class="invalid-feedback">
                        {{ $errors->first('expected_result') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.expected_result_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('post_condition') ? 'has-error' : '' }}">
                <label for="post_condition">{{ trans('cruds.testCase.fields.post_condition') }}*</label>
                <input type="text" id="post_condition" name="post_condition" class="form-control" value="{{ old('post_condition', isset($testCase) ? $testCase->post_condition : '') }}" required>
                @if($errors->has('post_condition'))
                    <em class="invalid-feedback">
                        {{ $errors->first('post_condition') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.post_condition_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('actual_result') ? 'has-error' : '' }}">
                <label for="actual_result">{{ trans('cruds.testCase.fields.actual_result') }}*</label>
                <textarea id="actual_result" name="actual_result" class="form-control ckeditor">{{ old('actual_result', isset($testCase) ? $testCase->actual_result : '') }}</textarea>
                @if($errors->has('actual_result'))
                    <em class="invalid-feedback">
                        {{ $errors->first('actual_result') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.actual_result_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.testCase.fields.status') }}*</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\TestCase::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'Select Status') === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="notes">{{ trans('cruds.testCase.fields.notes') }}</label>
                <textarea id="notes" name="notes" class="form-control ">{{ old('notes', isset($testCase) ? $testCase->notes : '') }}</textarea>
                @if($errors->has('notes'))
                    <em class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.testCase.fields.notes_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection