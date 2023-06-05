@extends('users.user_travel_passports.layout')

@section('userTravelPassports.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_travel_passports']) }}"> User Travel Passports</a></li>
                    <li class="breadcrumb-item">@lang('Edit User Travel Passport') #{{$userTravelPassport->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('users.user_travel_passports.update', compact('user', 'userTravelPassport')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="passport_nationality" class="form-label">Passport Nationality:</label>
        <input type="text" name="passport_nationality" id="passport_nationality" class="form-control" value="{{@old('passport_nationality', $userTravelPassport->passport_nationality)}}" />
        @if($errors->has('passport_nationality'))
			<div class='error small text-danger'>{{$errors->first('passport_nationality')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="passport_number" class="form-label">Passport Number:</label>
        <input type="text" name="passport_number" id="passport_number" class="form-control" value="{{@old('passport_number', $userTravelPassport->passport_number)}}" />
        @if($errors->has('passport_number'))
			<div class='error small text-danger'>{{$errors->first('passport_number')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="passport_date_issued" class="form-label">Passport Date Issued:</label>
        <input type="date" name="passport_date_issued" id="passport_date_issued" class="form-control" value="{{@old('passport_date_issued', $userTravelPassport->passport_date_issued)}}" />
        @if($errors->has('passport_date_issued'))
			<div class='error small text-danger'>{{$errors->first('passport_date_issued')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="passport_date_expiry" class="form-label">Passport Date Expiry:</label>
        <input type="date" name="passport_date_expiry" id="passport_date_expiry" class="form-control" value="{{@old('passport_date_expiry', $userTravelPassport->passport_date_expiry)}}" />
        @if($errors->has('passport_date_expiry'))
			<div class='error small text-danger'>{{$errors->first('passport_date_expiry')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="passport_issued_place" class="form-label">Passport Issued Place:</label>
        <input type="text" name="passport_issued_place" id="passport_issued_place" class="form-control" value="{{@old('passport_issued_place', $userTravelPassport->passport_issued_place)}}" />
        @if($errors->has('passport_issued_place'))
			<div class='error small text-danger'>{{$errors->first('passport_issued_place')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="passport_issued_country" class="form-label">Passport Issued Country:</label>
        <input type="text" name="passport_issued_country" id="passport_issued_country" class="form-control" value="{{@old('passport_issued_country', $userTravelPassport->passport_issued_country)}}" />
        @if($errors->has('passport_issued_country'))
			<div class='error small text-danger'>{{$errors->first('passport_issued_country')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.user_travel_passports.index', compact('user')) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update User Travel Passport')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
