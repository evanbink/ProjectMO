@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clients.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.client.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($client) ? $client->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.client.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($client) ? $client->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                <textarea id="address" name="address" class="form-control ckeditor">{{ old('address', isset($client) ? $client->address : '') }}</textarea>
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
                <label for="contact_person">{{ trans('cruds.client.fields.contact_person') }}*</label>
                <input type="text" id="contact_person" name="contact_person" class="form-control" value="{{ old('contact_person', isset($client) ? $client->contact_person : '') }}" required>
                @if($errors->has('contact_person'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact_person') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.contact_person_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                <label for="contact_number">{{ trans('cruds.client.fields.contact_number') }}*</label>
                <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ old('contact_number', isset($client) ? $client->contact_number : '') }}" required>
                @if($errors->has('contact_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.contact_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.client.fields.status') }}</label>
                @foreach(App\Client::STATUS_RADIO as $key => $label)
                    <div>
                        <input id="status_{{ $key }}" name="status" type="radio" value="{{ $key }}" {{ old('status', null) === (string)$key ? 'checked' : '' }}>
                        <label for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
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