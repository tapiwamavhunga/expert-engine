@extends('users.user_travel_recquests.layout')

@section('userTravelRecquest.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_recquests']) }}"> User Travel Recquest</a></li>
                </ol>

                <form action="{{ route('users.user_travel_recquests.index', compact('user')) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search User Travel Recquest..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-hover">
    <thead role="rowgroup">
    <tr role="row">
                    <th role='columnheader'>Home Address</th>
                    <th role='columnheader'>Street</th>
                    <th role='columnheader'>City</th>
                    <th role='columnheader'>State</th>
                    <th role='columnheader'>Postal Code</th>
                    <th role='columnheader'>Country</th>
                    <th role='columnheader'>Work Phone</th>
                    <th role='columnheader'>Home Phone</th>
                    <th role='columnheader'>Work Email</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($userTravelRecquest as $userTravelRecquest)
        <tr>
                            <td data-label="Home Address">{{ $userTravelRecquest->home_address ?: "(blank)" }}</td>
                            <td data-label="Street">{{ $userTravelRecquest->street ?: "(blank)" }}</td>
                            <td data-label="City">{{ $userTravelRecquest->city ?: "(blank)" }}</td>
                            <td data-label="State">{{ $userTravelRecquest->state ?: "(blank)" }}</td>
                            <td data-label="Postal Code">{{ $userTravelRecquest->postal_code ?: "(blank)" }}</td>
                            <td data-label="Country">{{ $userTravelRecquest->country ?: "(blank)" }}</td>
                            <td data-label="Work Phone">{{ $userTravelRecquest->work_phone ?: "(blank)" }}</td>
                            <td data-label="Home Phone">{{ $userTravelRecquest->home_phone ?: "(blank)" }}</td>
                            <td data-label="Work Email">{{ $userTravelRecquest->work_email ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('users.user_travel_recquests.show', compact('user', 'userTravelRecquest'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('users.user_travel_recquests.edit', compact('user', 'userTravelRecquest'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('users.user_travel_recquests.destroy', compact('user', 'userTravelRecquest'))}}" method="POST" style="display: inline;" class="m-0 p-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">@lang('Delete')</button>
            </form>
        </li>
    </ul>
</div>

                            </td>
        </tr>
    @endforeach
    </tbody>
</table>

                {{ $userTravelRecquest->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('users.user_travel_recquests.create', compact('user')) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new User Travel Recquest')</a>
            </div>
        </div>
    </div>
@endsection
