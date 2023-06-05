@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')
@section('content')

{{-- CONTAINER --}}


    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','orders']) }}"> Orders</a></li>
                    <li class="breadcrumb-item">@lang('Order') #{{$order->id}}</li>
                </ol>

                <a href="{{ route('admin.orders.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$order->id}}</td>
    </tr>
            <tr>
            <th scope="row">Name:</th>
            <td>{{ $order->name ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Lastname:</th>
            <td>{{ $order->lastname ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Middlename:</th>
            <td>{{ $order->middlename ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Email:</th>
            <td>{{ $order->email ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Nicknane:</th>
            <td>{{ $order->nicknane ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Gender:</th>
            <td>{{ $order->gender ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Home Address:</th>
            <td>{{ $order->home_address ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Street:</th>
            <td>{{ $order->street ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">City:</th>
            <td>{{ $order->city ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">State:</th>
            <td>{{ $order->state ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Postal Code:</th>
            <td>{{ $order->postal_code ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Country:</th>
            <td>{{ $order->country ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Work Phone:</th>
            <td>{{ $order->work_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Home Phone:</th>
            <td>{{ $order->home_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Work Email:</th>
            <td>{{ $order->work_email ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Cellphone:</th>
            <td>{{ $order->cellphone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E Name:</th>
            <td>{{ $order->e_name ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Relationship:</th>
            <td>{{ $order->relationship ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E Street:</th>
            <td>{{ $order->e_street ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E City:</th>
            <td>{{ $order->e_city ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E State:</th>
            <td>{{ $order->e_state ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E Work Phone:</th>
            <td>{{ $order->e_work_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E Home Phone:</th>
            <td>{{ $order->e_home_phone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E Email:</th>
            <td>{{ $order->e_email ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">E Cellphone:</th>
            <td>{{ $order->e_cellphone ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Discounts:</th>
            <td>{{ $order->discounts ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Seat:</th>
            <td>{{ $order->seat ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Seating Section:</th>
            <td>{{ $order->seating_section ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Special Meals:</th>
            <td>{{ $order->special_meals ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Preffered Departure Airport:</th>
            <td>{{ $order->preffered_departure_airport ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Other Travel Preferences:</th>
            <td>{{ $order->other_travel_preferences ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Medical Alerts:</th>
            <td>{{ $order->medical_alerts ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Room Type:</th>
            <td>{{ $order->room_type ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Smoking:</th>
            <td>{{ $order->smoking ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Foam Pillow:</th>
            <td>{{ $order->foam_pillow ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Message To Car Hotel Vendor:</th>
            <td>{{ Str::limit($order->message_to_car_hotel_vendor, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Accesibilty Need:</th>
            <td>{{ $order->accesibilty_need ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Car Smoking:</th>
            <td>{{ $order->car_smoking ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Car Transmission:</th>
            <td>{{ $order->car_transmission ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Car Gps:</th>
            <td>{{ $order->car_gps ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Message To Car Rental Vendor:</th>
            <td>{{ $order->message_to_car_rental_vendor ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Frequent Traveller Number:</th>
            <td>{{ $order->frequent_traveller_number ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Frequent Traveller Number Hotel Chain:</th>
            <td>{{ $order->frequent_traveller_number_hotel_chain ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Frequent Traveller Gender:</th>
            <td>{{ $order->frequent_traveller_gender ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Dhs Redress Number:</th>
            <td>{{ $order->dhs_redress_number ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Tsa Precheck Number:</th>
            <td>{{ $order->tsa_precheck_number ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('admin.orders.edit', compact('order')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('admin.orders.destroy', compact('order')) }}" method="POST" class="m-0 p-0">
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