@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')



{{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','user_profiles']) }}"> User Profiles</a></li>
                </ol>

                <form action="{{ route('admin.user_profiles.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search User Profiles..." value="{{ request()->search }}">
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
                    <th role='columnheader'>User</th>
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
    @foreach($userProfiles as $userProfile)
        <tr>                
                            <td data-label="Home Address">{{ Str::limit($userProfile->home_address, 50) ?: "(blank)"}}</td>
                            <td data-label="Street">{{ $userProfile->street ?: "(blank)" }}</td>
                            <td data-label="City">{{ $userProfile->city ?: "(blank)" }}</td>
                            <td data-label="State">{{ $userProfile->state ?: "(blank)" }}</td>
                            <td data-label="Postal Code">{{ $userProfile->postal_code ?: "(blank)" }}</td>
                            <td data-label="Country">{{ $userProfile->country ?: "(blank)" }}</td>
                            <td data-label="Work Phone">{{ $userProfile->work_phone ?: "(blank)" }}</td>
                            <td data-label="Home Phone">{{ $userProfile->home_phone ?: "(blank)" }}</td>
                            <td data-label="Work Email">{{ $userProfile->work_email ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('admin.user_profiles.show', compact('userProfile'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('admin.user_profiles.edit', compact('userProfile'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('admin.user_profiles.destroy', compact('userProfile'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $userProfiles->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('admin.user_profiles.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new User Profile')</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection