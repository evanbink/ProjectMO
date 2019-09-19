@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testCase.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.id') }}
                        </th>
                        <td>
                            {{ $testCase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.test_case') }}
                        </th>
                        <td>
                            {{ $testCase->test_case }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.title') }}
                        </th>
                        <td>
                            {{ $testCase->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.summary') }}
                        </th>
                        <td>
                            {{ $testCase->summary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.steps') }}
                        </th>
                        <td>
                            {!! $testCase->steps !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.data') }}
                        </th>
                        <td>
                            {{ $testCase->data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.expected_result') }}
                        </th>
                        <td>
                            {!! $testCase->expected_result !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.post_condition') }}
                        </th>
                        <td>
                            {{ $testCase->post_condition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.actual_result') }}
                        </th>
                        <td>
                            {!! $testCase->actual_result !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.status') }}
                        </th>
                        <td>
                            {{ App\TestCase::STATUS_SELECT[$testCase->status] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.notes') }}
                        </th>
                        <td>
                            {!! $testCase->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Author
                        </th>
                        <td>
                            @foreach($testCase->authors as $id => $author)
                                <span class="label label-info label-many">{{ $author->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testCase.fields.modified_by') }}
                        </th>
                        <td>
                            {{ $testCase->modified_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection