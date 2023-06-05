@extends('users.user_travel_visas.layout')

@section('userTravelVisas.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_visas']) }}"> User Travel Visas</a></li>
                    <li class="breadcrumb-item">@lang('User Travel Visa') #{{$userTravelVisa->id}}</li>
                </ol>

                <a href="{{ route('users.user_travel_visas.index', compact('user')) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$userTravelVisa->id}}</td>
    </tr>
            <tr>
            <th scope="row">Visa Nationality:</th>
            <td>{{ $userTravelVisa->visa_nationality ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Visa Type:</th>
            <td>{{ $userTravelVisa->visa_type ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Visa Number:</th>
            <td>{{ $userTravelVisa->visa_number ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Visa Number Expiration:</th>
            <td>{{ $userTravelVisa->visa_number_expiration ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($userTravelVisa->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($userTravelVisa->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('users.user_travel_visas.edit', compact('user', 'userTravelVisa')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('users.user_travel_visas.destroy', compact('user', 'userTravelVisa')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
