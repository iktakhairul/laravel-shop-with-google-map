@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('Edit') }} {{ trans('Category Title') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.categories.update", [$category->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('Category Name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('Category Fields') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('Save') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
@endsection
