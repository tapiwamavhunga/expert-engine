@extends('countries.layout')

@section('countries.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','countries']) }}"> Countries</a></li>
                    <li class="breadcrumb-item">@lang('Edit Country') #{{$country->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('countries.update', compact('country')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="code" class="form-label">Code:</label>
        <input type="text" name="code" id="code" class="form-control" value="{{@old('code', $country->code)}}" required/>
        @if($errors->has('code'))
			<div class='error small text-danger'>{{$errors->first('code')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{@old('name', $country->name)}}" required/>
        @if($errors->has('name'))
			<div class='error small text-danger'>{{$errors->first('name')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('countries.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Country')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
