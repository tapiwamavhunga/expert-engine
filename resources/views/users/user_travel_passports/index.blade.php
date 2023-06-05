@extends('users.user_travel_passports.layout')

@section('userTravelPassports.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_passports']) }}"> User Travel Passports</a></li>
                </ol>

                <form action="{{ route('users.user_travel_passports.index', compact('user')) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search User Travel Passports..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Passport Nationality</th>
                    <th role='columnheader'>Passport Number</th>
                    <th role='columnheader'>Passport Date Issued</th>
                    <th role='columnheader'>Passport Date Expiry</th>
                    <th role='columnheader'>Passport Issued Place</th>
                    <th role='columnheader'>Passport Issued Country</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($userTravelPassports as $userTravelPassport)
        <tr>
                            <td data-label="Passport Nationality">{{ $userTravelPassport->passport_nationality ?: "(blank)" }}</td>
                            <td data-label="Passport Number">{{ $userTravelPassport->passport_number ?: "(blank)" }}</td>
                            <td data-label="Passport Date Issued">{{ $userTravelPassport->passport_date_issued ?: "(blank)" }}</td>
                            <td data-label="Passport Date Expiry">{{ $userTravelPassport->passport_date_expiry ?: "(blank)" }}</td>
                            <td data-label="Passport Issued Place">{{ $userTravelPassport->passport_issued_place ?: "(blank)" }}</td>
                            <td data-label="Passport Issued Country">{{ $userTravelPassport->passport_issued_country ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('users.user_travel_passports.show', compact('user', 'userTravelPassport'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('users.user_travel_passports.edit', compact('user', 'userTravelPassport'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('users.user_travel_passports.destroy', compact('user', 'userTravelPassport'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $userTravelPassports->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('users.user_travel_passports.create', compact('user')) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new User Travel Passport')</a>
            </div>
        </div>
    </div>
@endsection
