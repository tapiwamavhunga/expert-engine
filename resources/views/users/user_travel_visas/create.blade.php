@extends('users.user_travel_visas.layout')

@section('userTravelVisas.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_visas']) }}"> User Travel Visas</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('users.user_travel_visas.store', compact('user')) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="visa_nationality" class="form-label">Visa Nationality:</label>
        <input type="text" name="visa_nationality" id="visa_nationality" class="form-control" value="{{@old('visa_nationality')}}" />
        @if($errors->has('visa_nationality'))
			<div class='error small text-danger'>{{$errors->first('visa_nationality')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="visa_type" class="form-label">Visa Type:</label>
        <input type="text" name="visa_type" id="visa_type" class="form-control" value="{{@old('visa_type')}}" />
        @if($errors->has('visa_type'))
			<div class='error small text-danger'>{{$errors->first('visa_type')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="visa_number" class="form-label">Visa Number:</label>
        <input type="text" name="visa_number" id="visa_number" class="form-control" value="{{@old('visa_number')}}" />
        @if($errors->has('visa_number'))
			<div class='error small text-danger'>{{$errors->first('visa_number')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="visa_number_expiration" class="form-label">Visa Number Expiration:</label>
        <input type="date" name="visa_number_expiration" id="visa_number_expiration" class="form-control" value="{{@old('visa_number_expiration')}}" />
        @if($errors->has('visa_number_expiration'))
			<div class='error small text-danger'>{{$errors->first('visa_number_expiration')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.user_travel_visas.index', compact('user')) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new User Travel Visa')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
