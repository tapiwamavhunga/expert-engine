@extends('users.user_emegency_contacts.layout')

@section('userEmegencyContact.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_emegency_contacts']) }}"> User Emegency Contact</a></li>
                    <li class="breadcrumb-item">@lang('User Emegency Contact') #{{$userEmegencyContact->id}}</li>
                </ol>

                <a href="{{ route('users.user_emegency_contacts.index', compact('user')) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$userEmegencyContact->id}}</td>
    </tr>
            <tr>
            <th scope="row">Name:</th>
            <td>{{ Str::limit($userEmegencyContact->name, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Email:</th>
            <td>{{ $userEmegencyContact->email ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Phone Number:</th>
            <td>{{ $userEmegencyContact->phone_number ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Relationship:</th>
            <td>{{ $userEmegencyContact->relationship ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Street:</th>
            <td>{{ $userEmegencyContact->street ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">City:</th>
            <td>{{ $userEmegencyContact->city ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Country:</th>
            <td>{{ $userEmegencyContact->country ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Postal Code:</th>
            <td>{{ $userEmegencyContact->postal_code ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">State:</th>
            <td>{{ $userEmegencyContact->state ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($userEmegencyContact->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($userEmegencyContact->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('users.user_emegency_contacts.edit', compact('user', 'userEmegencyContact')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('users.user_emegency_contacts.destroy', compact('user', 'userEmegencyContact')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
