@extends('users.user_travel_recquests.layout')

@section('userTravelRecquest.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_recquests']) }}"> User Travel Recquest</a></li>
                    <li class="breadcrumb-item">@lang('User Travel Recquest') #{{$userTravelRecquest->id}}</li>
                </ol>

                <a href="{{ route('users.user_travel_recquests.index', compact('user')) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$userTravelRecquest->id}}</td>
    </tr>
            <tr>
            <th scope="row">Home Address:</th>
            <td>{{ $userTravelRecquest->home_address ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Street:</th>
            <td>{{ $userTravelRecquest->street ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">City:</th>
            <td>{{ $userTravelRecquest->city ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">State:</th>
            <td>{{ $userTravelRecquest->state ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Postal Code:</th>
            <td>{{ $userTravelRecquest->postal_code ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Country:</th>
            <td>{{ $userTravelRecquest->country ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Work Phone:</th>
            <td>{{ $userTravelRecquest->work_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Home Phone:</th>
            <td>{{ $userTravelRecquest->home_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Work Email:</th>
            <td>{{ $userTravelRecquest->work_email ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($userTravelRecquest->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($userTravelRecquest->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('users.user_travel_recquests.edit', compact('user', 'userTravelRecquest')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('users.user_travel_recquests.destroy', compact('user', 'userTravelRecquest')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
