@extends('layouts.admin.admindashboard')

@section('content')
    <div class="container-fluid">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3 class="txt_default"><strong>My</strong> Dashboard</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a class="txt_default" href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
       
        

        

</main>
@endsection

@section('script')
{{-- <script src="{{ asset('js/shared/statistic.js') }}"></script> --}}

<script>
  

</script>

@endsection

