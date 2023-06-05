@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','user_profiles']) }}"> User Profiles</a></li>
                    <li class="breadcrumb-item">@lang('User Profile') #{{$userProfile->id}}</li>
                </ol>

                <a href="{{ route('admin.user_profiles.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$userProfile->id}}</td>
    </tr>
            <tr>
            <th scope="row">Home Address:</th>
            <td>{{ Str::limit($userProfile->home_address, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Street:</th>
            <td>{{ $userProfile->street ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">City:</th>
            <td>{{ $userProfile->city ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">State:</th>
            <td>{{ $userProfile->state ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Postal Code:</th>
            <td>{{ $userProfile->postal_code ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Country:</th>
            <td>{{ $userProfile->country ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Work Phone:</th>
            <td>{{ $userProfile->work_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Home Phone:</th>
            <td>{{ $userProfile->home_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Work Email:</th>
            <td>{{ $userProfile->work_email ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($userProfile->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($userProfile->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('user_profiles.edit', compact('userProfile')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('user_profiles.destroy', compact('userProfile')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection