@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

{{-- CONTAINER --}}


    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','companies']) }}"> Companies</a></li>
                </ol>

                <form action="{{ route('admin.companies.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search Companies..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-hover">
    <thead role="rowgroup">
    <tr role="row">
                    <th role='columnheader'>Name</th>
                    <th role='columnheader'>Contact Person</th>
                    <th role='columnheader'>Email</th>
                    <th role='columnheader'>Phone</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
                            <td data-label="Name">{{ $company->name ?: "(blank)" }}</td>
                            <td data-label="Contact Person">{{ Str::limit($company->contact_person, 50) ?: "(blank)"}}</td>
                            <td data-label="Email">{{ Str::limit($company->email, 50) ?: "(blank)"}}</td>
                            <td data-label="Phone">{{ Str::limit($company->phone, 50) ?: "(blank)"}}</td>

            <td data-label="Actions:" class="text-nowrap">
                                   @if($company->trashed())
    <form action="{{ route('companies.restore', ['company' => $company]) }}" method="POST" class="d-inline-block me-2">
        @csrf
        @method('PUT')
        <input type="submit" name="restore" value="@lang('Restore')" class="btn btn-success btn-sm"/>
    </form>
    <form action="{{ route('companies.purge', ['company' => $company]) }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <input type="submit" name="purge" value="@lang('Purge')" class="btn btn-danger btn-sm"/>
    </form>
@else
    <a href="{{route('admin.companies.show', compact('company'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('admin.companies.edit', compact('company'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('admin.companies.destroy', compact('company'))}}" method="POST" style="display: inline;" class="m-0 p-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">@lang('Delete')</button>
            </form>
        </li>
    </ul>
</div>

@endif

                            </td>
        </tr>
    @endforeach
    </tbody>
</table>

                {{ $companies->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('admin.companies.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new Company')</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection