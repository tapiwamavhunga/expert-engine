@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')
@section('content')

{{-- CONTAINER --}}


    <div class="container-fluid">
        <div class="card">

            




            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','orders']) }}"> Orders</a></li>
                </ol>

                <form action="{{ route('admin.orders.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search Orders..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Lastname</th>
                    <th role='columnheader'>Middlename</th>
                    <th role='columnheader'>Email</th>
                    <th role='columnheader'>Nicknane</th>
                    <th role='columnheader'>Gender</th>
                    <!-- <th role='columnheader'>Home Address</th>
                    <th role='columnheader'>Street</th>
                    <th role='columnheader'>City</th>
                    <th role='columnheader'>State</th>
                    <th role='columnheader'>Postal Code</th>
                    <th role='columnheader'>Country</th> -->
                    <th role='columnheader'>Work Phone</th>
                    <th role='columnheader'>Home Phone</th>
                    <th role='columnheader'>Work Email</th>
                    <th role='columnheader'>Cellphone</th>
                   <!--  <th role='columnheader'>E Name</th>
                    <th role='columnheader'>Relationship</th>
                    <th role='columnheader'>E Street</th>
                    <th role='columnheader'>E City</th>
                    <th role='columnheader'>E State</th>
                    <th role='columnheader'>E Work Phone</th>
                    <th role='columnheader'>E Home Phone</th>
                    <th role='columnheader'>E Email</th>
                    <th role='columnheader'>E Cellphone</th>
                    <th role='columnheader'>Discounts</th>
                    <th role='columnheader'>Seat</th>
                    <th role='columnheader'>Seating Section</th>
                    <th role='columnheader'>Special Meals</th>
                    <th role='columnheader'>Preffered Departure Airport</th>
                    <th role='columnheader'>Other Travel Preferences</th>
                    <th role='columnheader'>Medical Alerts</th>
                    <th role='columnheader'>Room Type</th>
                    <th role='columnheader'>Smoking</th>
                    <th role='columnheader'>Foam Pillow</th>
                    <th role='columnheader'>Message To Car Hotel Vendor</th>
                    <th role='columnheader'>Accesibilty Need</th>
                    <th role='columnheader'>Car Smoking</th>
                    <th role='columnheader'>Car Transmission</th>
                    <th role='columnheader'>Car Gps</th>
                    <th role='columnheader'>Message To Car Rental Vendor</th>
                    <th role='columnheader'>Frequent Traveller Number</th>
                    <th role='columnheader'>Frequent Traveller Number Hotel Chain</th>
                    <th role='columnheader'>Frequent Traveller Gender</th>
                    <th role='columnheader'>Dhs Redress Number</th>
                    <th role='columnheader'>Tsa Precheck Number</th> -->
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
                            <td data-label="Name">{{ $order->name ?: "(blank)" }}</td>
                            <td data-label="Lastname">{{ $order->lastname ?: "(blank)" }}</td>
                            <td data-label="Middlename">{{ $order->middlename ?: "(blank)" }}</td>
                            <td data-label="Email">{{ $order->email ?: "(blank)" }}</td>
                            <td data-label="Nicknane">{{ $order->nicknane ?: "(blank)" }}</td>
                            <td data-label="Gender">{{ $order->gender ?: "(blank)" }}</td>
                           <!--  <td data-label="Home Address">{{ $order->home_address ?: "(blank)" }}</td>
                            <td data-label="Street">{{ $order->street ?: "(blank)" }}</td>
                            <td data-label="City">{{ $order->city ?: "(blank)" }}</td>
                            <td data-label="State">{{ $order->state ?: "(blank)" }}</td>
                            <td data-label="Postal Code">{{ $order->postal_code ?: "(blank)" }}</td>
                            <td data-label="Country">{{ $order->country ?: "(blank)" }}</td> -->
                            <td data-label="Work Phone">{{ $order->work_phone ?: "(blank)" }}</td>
                            <td data-label="Home Phone">{{ $order->home_phone ?: "(blank)" }}</td>
                            <td data-label="Work Email">{{ $order->work_email ?: "(blank)" }}</td>
                            <td data-label="Cellphone">{{ $order->cellphone ?: "(blank)" }}</td>
                           <!--  <td data-label="E Name">{{ $order->e_name ?: "(blank)" }}</td>
                            <td data-label="Relationship">{{ $order->relationship ?: "(blank)" }}</td>
                            <td data-label="E Street">{{ $order->e_street ?: "(blank)" }}</td>
                            <td data-label="E City">{{ $order->e_city ?: "(blank)" }}</td>
                            <td data-label="E State">{{ $order->e_state ?: "(blank)" }}</td>
                            <td data-label="E Work Phone">{{ $order->e_work_phone ?: "(blank)" }}</td>
                            <td data-label="E Home Phone">{{ $order->e_home_phone ?: "(blank)" }}</td>
                            <td data-label="E Email">{{ $order->e_email ?: "(blank)" }}</td>
                            <td data-label="E Cellphone">{{ $order->e_cellphone ?: "(blank)" }}</td>
                            <td data-label="Discounts">{{ $order->discounts ?: "(blank)" }}</td>
                            <td data-label="Seat">{{ $order->seat ?: "(blank)" }}</td>
                            <td data-label="Seating Section">{{ $order->seating_section ?: "(blank)" }}</td>
                            <td data-label="Special Meals">{{ $order->special_meals ?: "(blank)" }}</td>
                            <td data-label="Preffered Departure Airport">{{ $order->preffered_departure_airport ?: "(blank)" }}</td>
                            <td data-label="Other Travel Preferences">{{ $order->other_travel_preferences ?: "(blank)" }}</td>
                            <td data-label="Medical Alerts">{{ $order->medical_alerts ?: "(blank)" }}</td>
                            <td data-label="Room Type">{{ $order->room_type ?: "(blank)" }}</td>
                            <td data-label="Smoking">{{ $order->smoking ?: "(blank)" }}</td>
                            <td data-label="Foam Pillow">{{ $order->foam_pillow ?: "(blank)" }}</td>
                            <td data-label="Message To Car Hotel Vendor">{{ Str::limit($order->message_to_car_hotel_vendor, 50) ?: "(blank)"}}</td>
                            <td data-label="Accesibilty Need">{{ $order->accesibilty_need ?: "(blank)" }}</td>
                            <td data-label="Car Smoking">{{ $order->car_smoking ?: "(blank)" }}</td>
                            <td data-label="Car Transmission">{{ $order->car_transmission ?: "(blank)" }}</td>
                            <td data-label="Car Gps">{{ $order->car_gps ?: "(blank)" }}</td>
                            <td data-label="Message To Car Rental Vendor">{{ $order->message_to_car_rental_vendor ?: "(blank)" }}</td>
                            <td data-label="Frequent Traveller Number">{{ $order->frequent_traveller_number ?: "(blank)" }}</td>
                            <td data-label="Frequent Traveller Number Hotel Chain">{{ $order->frequent_traveller_number_hotel_chain ?: "(blank)" }}</td>
                            <td data-label="Frequent Traveller Gender">{{ $order->frequent_traveller_gender ?: "(blank)" }}</td>
                            <td data-label="Dhs Redress Number">{{ $order->dhs_redress_number ?: "(blank)" }}</td>
                            <td data-label="Tsa Precheck Number">{{ $order->tsa_precheck_number ?: "(blank)" }}</td> -->

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('admin.orders.show', compact('order'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('admin.orders.edit', compact('order'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('admin.orders.destroy', compact('order'))}}" method="POST" style="display: inline;" class="m-0 p-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">@lang('Delete')</button>
            </form>
        </li>
    </ul>
</div>

                            </td>
        </tr>
    @endforeach
    </tbody>
</table>

                {{ $orders->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('admin.orders.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new Order')</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection
