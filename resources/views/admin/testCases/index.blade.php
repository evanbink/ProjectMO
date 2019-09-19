@extends('layouts.admin')
@section('content')
@can('test_case_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.test-cases.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.testCase.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.testCase.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TestCase">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.test_case') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.summary') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.data') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.post_condition') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.testCase.fields.modified_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testCases as $key => $testCase)
                        <tr data-entry-id="{{ $testCase->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $testCase->id ?? '' }}
                            </td>
                            <td>
                                {{ $testCase->test_case ?? '' }}
                            </td>
                            <td>
                                {{ $testCase->title ?? '' }}
                            </td>
                            <td>
                                {{ $testCase->summary ?? '' }}
                            </td>
                            <td>
                                {{ $testCase->data ?? '' }}
                            </td>
                            <td>
                                {{ $testCase->post_condition ?? '' }}
                            </td>
                            <td>
                                {{ App\TestCase::STATUS_SELECT[$testCase->status] ?? '' }}
                            </td>
                            <td>
                                {{ $testCase->notes ?? '' }}
                            </td>
                            <td>
                                @foreach($testCase->authors as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $testCase->modified_by->name ?? '' }}
                            </td>
                            <td>
                                @can('test_case_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.test-cases.show', $testCase->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('test_case_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.test-cases.edit', $testCase->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('test_case_delete')
                                    <form action="{{ route('admin.test-cases.destroy', $testCase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('test_case_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.test-cases.massDestroy') }}",
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
  $('.datatable-TestCase:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection