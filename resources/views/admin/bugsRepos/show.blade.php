@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bugsRepo.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.id') }}
                        </th>
                        <td>
                            {{ $bugsRepo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.desc') }}
                        </th>
                        <td>
                            {{ $bugsRepo->desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.cause') }}
                        </th>
                        <td>
                            {{ $bugsRepo->cause }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.attach') }}
                        </th>
                        <td>
                            @if($bugsRepo->attach)
                                <a href="{{ $bugsRepo->attach->getUrl() }}" target="_blank">
                                    <img src="{{ $bugsRepo->attach->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.related') }}
                        </th>
                        <td>
                            {{ $bugsRepo->related->desc ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection