@extends('layouts.admin')
@section('content')
@can('bugs_repo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.bugs-repos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.bugsRepo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bugsRepo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BugsRepo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.desc') }}
                        </th>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.cause') }}
                        </th>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.attach') }}
                        </th>
                        <th>
                            {{ trans('cruds.bugsRepo.fields.related') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bugsRepos as $key => $bugsRepo)
                        <tr data-entry-id="{{ $bugsRepo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bugsRepo->id ?? '' }}
                            </td>
                            <td>
                                {{ $bugsRepo->desc ?? '' }}
                            </td>
                            <td>
                                {{ $bugsRepo->cause ?? '' }}
                            </td>
                            <td>
                                @if($bugsRepo->attach)
                                    <a href="{{ $bugsRepo->attach->getUrl() }}" target="_blank">
                                        <img src="{{ $bugsRepo->attach->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $bugsRepo->related->desc ?? '' }}
                            </td>
                            <td>
                                @can('bugs_repo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bugs-repos.show', $bugsRepo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('bugs_repo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bugs-repos.edit', $bugsRepo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('bugs_repo_delete')
                                    <form action="{{ route('admin.bugs-repos.destroy', $bugsRepo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('bugs_repo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bugs-repos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-BugsRepo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection