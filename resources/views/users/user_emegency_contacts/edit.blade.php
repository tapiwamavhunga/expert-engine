@extends('users.user_emegency_contacts.layout')

@section('userEmegencyContact.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','users']) }}"> Users</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0]) }}"> Users #{{ $user->id }}</a></li>
						<li class="breadcrumb-item"><a href="{{ implode('/', ['','users',$user?->id ?: 0,'user_emegency_contacts']) }}"> User Emegency Contact</a></li>
                    <li class="breadcrumb-item">@lang('Edit User Emegency Contact') #{{$userEmegencyContact->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('users.user_emegency_contacts.update', compact('user', 'userEmegencyContact')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <textarea name="name" id="name" class="form-control" >{{@old('name', $userEmegencyContact->name)}}</textarea>
        @if($errors->has('name'))
			<div class='error small text-danger'>{{$errors->first('name')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{@old('email', $userEmegencyContact->email)}}" />
        @if($errors->has('email'))
			<div class='error small text-danger'>{{$errors->first('email')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{@old('phone_number', $userEmegencyContact->phone_number)}}" />
        @if($errors->has('phone_number'))
			<div class='error small text-danger'>{{$errors->first('phone_number')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="relationship" class="form-label">Relationship:</label>
        <select name="relationship" id="relationship" class="form-control form-select" required>
    <option value="">Select Relationship</option>
    @foreach(["sister" => "Sister", "brother" => "Brother", "husband" => "Husband", "wife" => "Wife", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('relationship', $userEmegencyContact->relationship) == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('relationship'))
			<div class='error small text-danger'>{{$errors->first('relationship')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="street" class="form-label">Street:</label>
        <input type="text" name="street" id="street" class="form-control" value="{{@old('street', $userEmegencyContact->street)}}" />
        @if($errors->has('street'))
			<div class='error small text-danger'>{{$errors->first('street')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">City:</label>
        <input type="text" name="city" id="city" class="form-control" value="{{@old('city', $userEmegencyContact->city)}}" />
        @if($errors->has('city'))
			<div class='error small text-danger'>{{$errors->first('city')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">Country:</label>
        <input type="text" name="country" id="country" class="form-control" value="{{@old('country', $userEmegencyContact->country)}}" />
        @if($errors->has('country'))
			<div class='error small text-danger'>{{$errors->first('country')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="postal_code" class="form-label">Postal Code:</label>
        <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{@old('postal_code', $userEmegencyContact->postal_code)}}" />
        @if($errors->has('postal_code'))
			<div class='error small text-danger'>{{$errors->first('postal_code')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">State:</label>
        <input type="text" name="state" id="state" class="form-control" value="{{@old('state', $userEmegencyContact->state)}}" />
        @if($errors->has('state'))
			<div class='error small text-danger'>{{$errors->first('state')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('users.user_emegency_contacts.index', compact('user')) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update User Emegency Contact')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
