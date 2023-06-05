@extends('users.user_emegency_contacts.layout')

@section('userEmegencyContact.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_emegency_contacts']) }}"> User Emegency Contact</a></li>
                </ol>

                <form action="{{ route('users.user_emegency_contacts.index', compact('user')) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search User Emegency Contact..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Name</th>
                    <th role='columnheader'>Email</th>
                    <th role='columnheader'>Phone Number</th>
                    <th role='columnheader'>Relationship</th>
                    <th role='columnheader'>Street</th>
                    <th role='columnheader'>City</th>
                    <th role='columnheader'>Country</th>
                    <th role='columnheader'>Postal Code</th>
                    <th role='columnheader'>State</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($userEmegencyContact as $userEmegencyContact)
        <tr>
                            <td data-label="Name">{{ Str::limit($userEmegencyContact->name, 50) ?: "(blank)"}}</td>
                            <td data-label="Email">{{ $userEmegencyContact->email ?: "(blank)" }}</td>
                            <td data-label="Phone Number">{{ $userEmegencyContact->phone_number ?: "(blank)" }}</td>
                            <td data-label="Relationship">{{ $userEmegencyContact->relationship ?: "(blank)" }}</td>
                            <td data-label="Street">{{ $userEmegencyContact->street ?: "(blank)" }}</td>
                            <td data-label="City">{{ $userEmegencyContact->city ?: "(blank)" }}</td>
                            <td data-label="Country">{{ $userEmegencyContact->country ?: "(blank)" }}</td>
                            <td data-label="Postal Code">{{ $userEmegencyContact->postal_code ?: "(blank)" }}</td>
                            <td data-label="State">{{ $userEmegencyContact->state ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('users.user_emegency_contacts.show', compact('user', 'userEmegencyContact'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('users.user_emegency_contacts.edit', compact('user', 'userEmegencyContact'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('users.user_emegency_contacts.destroy', compact('user', 'userEmegencyContact'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $userEmegencyContact->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('users.user_emegency_contacts.create', compact('user')) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new User Emegency Contact')</a>
            </div>
        </div>
    </div>
@endsection
