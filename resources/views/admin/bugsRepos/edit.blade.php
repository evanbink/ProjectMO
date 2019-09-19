@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bugsRepo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.bugs-repos.update", [$bugsRepo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                <label for="desc">{{ trans('cruds.bugsRepo.fields.desc') }}*</label>
                <input type="text" id="desc" name="desc" class="form-control" value="{{ old('desc', isset($bugsRepo) ? $bugsRepo->desc : '') }}" required>
                @if($errors->has('desc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('desc') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.bugsRepo.fields.desc_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cause') ? 'has-error' : '' }}">
                <label for="cause">{{ trans('cruds.bugsRepo.fields.cause') }}*</label>
                <input type="text" id="cause" name="cause" class="form-control" value="{{ old('cause', isset($bugsRepo) ? $bugsRepo->cause : '') }}" required>
                @if($errors->has('cause'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cause') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.bugsRepo.fields.cause_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('attach') ? 'has-error' : '' }}">
                <label for="attach">{{ trans('cruds.bugsRepo.fields.attach') }}</label>
                <div class="needsclick dropzone" id="attach-dropzone">

                </div>
                @if($errors->has('attach'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attach') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.bugsRepo.fields.attach_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('related_id') ? 'has-error' : '' }}">
                <label for="related">{{ trans('cruds.bugsRepo.fields.related') }}</label>
                <select name="related_id" id="related" class="form-control select2">
                    @foreach($related as $id => $related)
                        <option value="{{ $id }}" {{ (isset($bugsRepo) && $bugsRepo->related ? $bugsRepo->related->id : old('related_id')) == $id ? 'selected' : '' }}>{{ $related }}</option>
                    @endforeach
                </select>
                @if($errors->has('related_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('related_id') }}
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

@section('scripts')
<script>
    Dropzone.options.attachDropzone = {
    url: '{{ route('admin.bugs-repos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="attach"]').remove()
      $('form').append('<input type="hidden" name="attach" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attach"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($bugsRepo) && $bugsRepo->attach)
      var file = {!! json_encode($bugsRepo->attach) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attach" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop