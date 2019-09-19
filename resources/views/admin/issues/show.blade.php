@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.issue.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.id') }}
                        </th>
                        <td>
                            {{ $issue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.projects_name') }}
                        </th>
                        <td>
                            {{ $issue->projects_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.desc') }}
                        </th>
                        <td>
                            {{ $issue->desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.priority') }}
                        </th>
                        <td>
                            {{ App\Issue::PRIORITY_SELECT[$issue->priority] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.testcase') }}
                        </th>
                        <td>
                            {{ $issue->testcase->test_case ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.issue.fields.progress') }}
                        </th>
                        <td>
                            {{ $issue->progress->status ?? '' }}
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