@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_visas']) }}"> User Travel Visas</a></li>
                </ol>

                <form action="{{ route('admin.users.user_travel_visas.index', compact('user')) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search User Travel Visas..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Visa Nationality</th>
                    <th role='columnheader'>Visa Type</th>
                    <th role='columnheader'>Visa Number</th>
                    <th role='columnheader'>Visa Number Expiration</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($userTravelVisas as $userTravelVisa)
        <tr>
                            <td data-label="Visa Nationality">{{ $userTravelVisa->visa_nationality ?: "(blank)" }}</td>
                            <td data-label="Visa Type">{{ $userTravelVisa->visa_type ?: "(blank)" }}</td>
                            <td data-label="Visa Number">{{ $userTravelVisa->visa_number ?: "(blank)" }}</td>
                            <td data-label="Visa Number Expiration">{{ $userTravelVisa->visa_number_expiration ?: "(blank)" }}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('admin.users.user_travel_visas.show', compact('user', 'userTravelVisa'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('admin.users.user_travel_visas.edit', compact('user', 'userTravelVisa'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('admin.users.user_travel_visas.destroy', compact('user', 'userTravelVisa'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $userTravelVisas->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('admin.users.user_travel_visas.create', compact('user')) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new User Travel Visa')</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection