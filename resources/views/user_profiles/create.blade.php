@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','user_profiles']) }}"> User Profiles</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.user_profiles.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="home_address" class="form-label">Home Address:</label>
        <textarea name="home_address" id="home_address" class="form-control" >{{@old('home_address')}}</textarea>
        @if($errors->has('home_address'))
			<div class='error small text-danger'>{{$errors->first('home_address')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="street" class="form-label">Street:</label>
        <input type="text" name="street" id="street" class="form-control" value="{{@old('street')}}" />
        @if($errors->has('street'))
			<div class='error small text-danger'>{{$errors->first('street')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">City:</label>
        <input type="text" name="city" id="city" class="form-control" value="{{@old('city')}}" />
        @if($errors->has('city'))
			<div class='error small text-danger'>{{$errors->first('city')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">State:</label>
        <input type="text" name="state" id="state" class="form-control" value="{{@old('state')}}" />
        @if($errors->has('state'))
			<div class='error small text-danger'>{{$errors->first('state')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="postal_code" class="form-label">Postal Code:</label>
        <input type="date" name="postal_code" id="postal_code" class="form-control" value="{{@old('postal_code')}}" />
        @if($errors->has('postal_code'))
			<div class='error small text-danger'>{{$errors->first('postal_code')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">Country:</label>
        <input type="text" name="country" id="country" class="form-control" value="{{@old('country')}}" />
        @if($errors->has('country'))
			<div class='error small text-danger'>{{$errors->first('country')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="work_phone" class="form-label">Work Phone:</label>
        <input type="text" name="work_phone" id="work_phone" class="form-control" value="{{@old('work_phone')}}" />
        @if($errors->has('work_phone'))
			<div class='error small text-danger'>{{$errors->first('work_phone')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="home_phone" class="form-label">Home Phone:</label>
        <input type="text" name="home_phone" id="home_phone" class="form-control" value="{{@old('home_phone')}}" />
        @if($errors->has('home_phone'))
			<div class='error small text-danger'>{{$errors->first('home_phone')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="work_email" class="form-label">Work Email:</label>
        <input type="email" name="work_email" id="work_email" class="form-control" value="{{@old('work_email')}}" />
        @if($errors->has('work_email'))
			<div class='error small text-danger'>{{$errors->first('work_email')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('admin.user_profiles.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new User Profile')</button>
                        </div>
                    </div>
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