@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('Show') }} {{ trans('Shop') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.shops.index') }}">
                        {{ trans('Back to list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('Td') }}
                        </th>
                        <td>
                            {{ $shop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Name') }}
                        </th>
                        <td>
                            {{ $shop->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Categories') }}
                        </th>
                        <td>
                            @foreach($shop->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Description') }}
                        </th>
                        <td>
                            {{ $shop->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Photos') }}
                        </th>
                        <td>
                            @foreach($shop->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Address') }}
                        </th>
                        <td>
                            {{ $shop->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $shop->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Working hours') }}
                        </th>
                        <td>
                            @if($shop->days)
                                @foreach($shop->days as $day)
                                    <strong>{{ ucfirst($day->name) }}</strong>:
                                    from <strong>{{ $day->pivot->from_hours }}:{{ $day->pivot->from_minutes }}</strong>
                                    to <strong>{{ $day->pivot->to_hours }}:{{ $day->pivot->to_minutes }}</strong>
                                    <br>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.shops.index') }}">
                        {{ trans('Back to list') }}
                    </a>
                </div>
            </div>


        </div>
    </div>
@endsection
