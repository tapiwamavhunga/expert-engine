@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}


    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','companies']) }}"> Companies</a></li>
                    <li class="breadcrumb-item">@lang('Company') #{{$company->id}}</li>
                </ol>

                <a href="{{ route('admin.companies.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$company->id}}</td>
    </tr>
            <tr>
            <th scope="row">Name:</th>
            <td>{{ $company->name ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Contact Person:</th>
            <td>{{ Str::limit($company->contact_person, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Email:</th>
            <td>{{ Str::limit($company->email, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Phone:</th>
            <td>{{ Str::limit($company->phone, 50) ?: "(blank)"}}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($company->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($company->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('admin.companies.edit', compact('company')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('admin.companies.destroy', compact('company')) }}" method="POST" class="m-0 p-0">
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