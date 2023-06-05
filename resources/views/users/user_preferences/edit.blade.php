@extends('users.user_preferences.layout')

@section('userPreference.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_preferences']) }}"> User Preference</a></li>
                    <li class="breadcrumb-item">@lang('Edit User Preference') #{{$userPreference->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('users.user_preferences.update', compact('user', 'userPreference')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.user_preferences.index', compact('user')) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update User Preference')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
