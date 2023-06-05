@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}


    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','companies']) }}"> Companies</a></li>
                    <li class="breadcrumb-item">@lang('Edit Company') #{{$company->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.companies.update', compact('company')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{@old('name', $company->name)}}" />
        @if($errors->has('name'))
			<div class='error small text-danger'>{{$errors->first('name')}}</div>
		@endif
    </div>


         <div class="mb-3">
        <label for="contact_person" class="form-label">Contact Person:</label>
        <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{@old('contact_person', $company->contact_person)}}" />
        @if($errors->has('contact_person'))
            <div class='error small text-danger'>{{$errors->first('contact_person')}}</div>
        @endif
    </div>


    
      <div class="mb-3">
        <label for="email" class="form-label">Contact Email:</label>
        <input type="text" name="email" id="email" class="form-control" value="{{@old('email', $company->email)}}" />
        @if($errors->has('email'))
            <div class='error small text-danger'>{{$errors->first('email')}}</div>
        @endif
    </div>


      <div class="mb-3">
        <label for="phone" class="form-label">Contact Person:</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{@old('phone', $company->phone)}}" />
        @if($errors->has('phone'))
            <div class='error small text-danger'>{{$errors->first('phone')}}</div>
        @endif
    </div>
    

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('admin.companies.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Company')</button>
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