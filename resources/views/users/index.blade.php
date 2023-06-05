@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
                </ol>

                <form action="{{ route('admin.users.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control me-2" name="search" placeholder="Search Users..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
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
                    <th role='columnheader'>Work Phone</th>
                    <th role='columnheader'>Work Phone</th>

                    <th role='columnheader'>Work Email</th>
                    <th role='columnheader'>Company</th>

                    <!-- <th role='columnheader'>Is Activated</th> -->
                    <!-- <th role='columnheader'>Role</th> -->
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
                            <td data-label="Name">{{ $user->name ?: "(blank)" }}</td>
                            <td data-label="Email">{{ $user->email ?: "(blank)" }}</td>
                            <td data-label="Email Verified At">{{$user?->profile?->street ?: "(blank)"}}</td>
                            
                           <td data-label="Email Verified At">{{$user?->profile?->home_phone ?: "(blank)"}}</td>


                            <td data-label="Password">{{$user?->profile?->work_email ?: "(blank)"}}</td>
                           
                           <td data-label="Remember Token">{{ $user->company ?: "(blank)" }}</td>
                            

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('admin.users.show', compact('user'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('admin.users.edit', compact('user'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('admin.users.destroy', compact('user'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $users->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('admin.users.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new User')</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection