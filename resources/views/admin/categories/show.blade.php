@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('Show') }} {{ trans('Category') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                        {{ trans('Back to list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('Id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                        {{ trans('Back to list') }}
                    </a>
                </div>
            </div>


        </div>
    </div>
@endsection
