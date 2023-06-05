@extends('layouts.admin.admindashboard')
@section('title', 'Manage Profile')
@section('content')

{{-- CONTAINER --}}


    <div class="container-fluid">
       

        <div class="card">


        <div class="card-body container">
            
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="https://docsman.tirisano-travel.co.za/storage/branding_media/f1c623e4-ba32-48ef-8018-a7ef8c6ec3a1.png" alt="" >
                <h4>Create New Travel Recquest</h4>
              </div>


              <div class="row pl-5 pr-5">

                <div class="col-md-4 order-md-2 mb-4">

                  <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Profile</span>
                  </h4>
        
                  <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Hotel</h6>
                        <small class="text-muted">Brief description</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Car Rental</h6>
                        <small class="text-muted">Brief description</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Visas</h6>
                        <small class="text-muted">Brief description</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                      <div class="text-success">
                        <h6 class="my-0">Special Recquests</h6>
                        <small>EXAMPLECODE</small>
                      </div>
                    </li>
                              </ul>

          
                </div>



        <div class="col-md-8 order-md-1">

<h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your Recquest</span>
          </h4>
          <p><strong>IMPORTANT NOTE </br>
YOUR NAME AND AIRPORT SECURITY:<br> Please make certain that the first,
middle, and last names shown are identical to those on the photo identification
that you will be presenting at the airport.</strong></p>


        
        <div class="row">

            <form action="{{ route('admin.orders.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body row">

                    <h4 class="mb-3">Personal Information</h4>


                        @csrf
    <div class="mb-3 col-md-4">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{@old('name')}}" required/>
        @if($errors->has('name'))
            <div class='error small text-danger'>{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="lastname" class="form-label">Lastname:</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="{{@old('lastname')}}" />
        @if($errors->has('lastname'))
            <div class='error small text-danger'>{{$errors->first('lastname')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="middlename" class="form-label">Middlename:</label>
        <input type="text" name="middlename" id="middlename" class="form-control" value="{{@old('middlename')}}" />
        @if($errors->has('middlename'))
            <div class='error small text-danger'>{{$errors->first('middlename')}}</div>
        @endif
    </div>

    <div class="mb-3 col-md-6">
        <label for="nicknane" class="form-label">Nicknane:</label>
        <input type="text" name="nicknane" id="nicknane" class="form-control" value="{{@old('nicknane')}}" />
        @if($errors->has('nicknane'))
            <div class='error small text-danger'>{{$errors->first('nicknane')}}</div>
        @endif
    </div>

    <div class="mb-3 col-md-6">
        <label for="gender" class="form-label">Gender:</label>
        <select name="gender" id="gender" class="form-control form-select" required>
    <option value="">Select Gender</option>
    @foreach(["male" => "Male", "female" => "Female", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('gender') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('gender'))
            <div class='error small text-danger'>{{$errors->first('gender')}}</div>
        @endif
    </div>




    <div class="mb-5">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{@old('email')}}" />
        @if($errors->has('email'))
            <div class='error small text-danger'>{{$errors->first('email')}}</div>
        @endif
    </div>
    
    <h4 class="mb-3">Home Address</h4>


    <div class="mb-3 col-md-6">
        <label for="home_address" class="form-label">Home Address:</label>
        <input type="text" name="home_address" id="home_address" class="form-control" value="{{@old('home_address')}}" />
        @if($errors->has('home_address'))
            <div class='error small text-danger'>{{$errors->first('home_address')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="street" class="form-label">Street:</label>
        <input type="text" name="street" id="street" class="form-control" value="{{@old('street')}}" />
        @if($errors->has('street'))
            <div class='error small text-danger'>{{$errors->first('street')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="city" class="form-label">City:</label>
        <input type="text" name="city" id="city" class="form-control" value="{{@old('city')}}" />
        @if($errors->has('city'))
            <div class='error small text-danger'>{{$errors->first('city')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="state" class="form-label">State:</label>
        <input type="text" name="state" id="state" class="form-control" value="{{@old('state')}}" />
        @if($errors->has('state'))
            <div class='error small text-danger'>{{$errors->first('state')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="postal_code" class="form-label">Postal Code:</label>
        <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{@old('postal_code')}}" />
        @if($errors->has('postal_code'))
            <div class='error small text-danger'>{{$errors->first('postal_code')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="country" class="form-label">Country:</label>
        <input type="text" name="country" id="country" class="form-control" value="{{@old('country')}}" />
        @if($errors->has('country'))
            <div class='error small text-danger'>{{$errors->first('country')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="work_phone" class="form-label">Work Phone:</label>
        <input type="text" name="work_phone" id="work_phone" class="form-control" value="{{@old('work_phone')}}" />
        @if($errors->has('work_phone'))
            <div class='error small text-danger'>{{$errors->first('work_phone')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="home_phone" class="form-label">Home Phone:</label>
        <input type="text" name="home_phone" id="home_phone" class="form-control" value="{{@old('home_phone')}}" />
        @if($errors->has('home_phone'))
            <div class='error small text-danger'>{{$errors->first('home_phone')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="work_email" class="form-label">Work Email:</label>
        <input type="email" name="work_email" id="work_email" class="form-control" value="{{@old('work_email')}}" />
        @if($errors->has('work_email'))
            <div class='error small text-danger'>{{$errors->first('work_email')}}</div>
        @endif
    </div>
    <div class="mb-5 col-md-6">
        <label for="cellphone" class="form-label">Cellphone:</label>
        <input type="text" name="cellphone" id="cellphone" class="form-control" value="{{@old('cellphone')}}" />
        @if($errors->has('cellphone'))
            <div class='error small text-danger'>{{$errors->first('cellphone')}}</div>
        @endif
    </div>

     <h4 class="mb-3">Emergency Contact Information</h4>

    <div class="mb-3 col-md-6">
        <label for="e_name" class="form-label">E Name:</label>
        <input type="text" name="e_name" id="e_name" class="form-control" value="{{@old('e_name')}}" />
        @if($errors->has('e_name'))
            <div class='error small text-danger'>{{$errors->first('e_name')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="relationship" class="form-label">Relationship:</label>
        <select name="relationship" id="relationship" class="form-control form-select" required>
    <option value="">Select Relationship</option>
    @foreach(["brother" => "Brother", "sister" => "Sister", "cousin" => "Cousin", "freind" => "Freind", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('relationship') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('relationship'))
            <div class='error small text-danger'>{{$errors->first('relationship')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="e_street" class="form-label">E Street:</label>
        <input type="text" name="e_street" id="e_street" class="form-control" value="{{@old('e_street')}}" />
        @if($errors->has('e_street'))
            <div class='error small text-danger'>{{$errors->first('e_street')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="e_city" class="form-label">E City:</label>
        <input type="text" name="e_city" id="e_city" class="form-control" value="{{@old('e_city')}}" />
        @if($errors->has('e_city'))
            <div class='error small text-danger'>{{$errors->first('e_city')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="e_state" class="form-label">E State:</label>
        <input type="text" name="e_state" id="e_state" class="form-control" value="{{@old('e_state')}}" />
        @if($errors->has('e_state'))
            <div class='error small text-danger'>{{$errors->first('e_state')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="e_work_phone" class="form-label">E Work Phone:</label>
        <input type="text" name="e_work_phone" id="e_work_phone" class="form-control" value="{{@old('e_work_phone')}}" />
        @if($errors->has('e_work_phone'))
            <div class='error small text-danger'>{{$errors->first('e_work_phone')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="e_home_phone" class="form-label">E Home Phone:</label>
        <input type="text" name="e_home_phone" id="e_home_phone" class="form-control" value="{{@old('e_home_phone')}}" />
        @if($errors->has('e_home_phone'))
            <div class='error small text-danger'>{{$errors->first('e_home_phone')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="e_email" class="form-label">E Email:</label>
        <input type="email" name="e_email" id="e_email" class="form-control" value="{{@old('e_email')}}" />
        @if($errors->has('e_email'))
            <div class='error small text-danger'>{{$errors->first('e_email')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-12">
        <label for="e_cellphone" class="form-label">E Cellphone:</label>
        <input type="text" name="e_cellphone" id="e_cellphone" class="form-control" value="{{@old('e_cellphone')}}" />
        @if($errors->has('e_cellphone'))
            <div class='error small text-danger'>{{$errors->first('e_cellphone')}}</div>
        @endif
    </div>

 <h4 class="mb-3">Travel Preferences</h4>


    <div class="mb-3 col-md-4">
        <label for="discounts" class="form-label">Discounts:</label>
        <select name="discounts" id="discounts" class="form-control form-select" required>
    <option value="">Select Discounts</option>
    @foreach(["AAA/CAA" => "Aaa/Caa", "government" => "Government", "military" => "Military", "senior" => "Senior", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('discounts') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('discounts'))
            <div class='error small text-danger'>{{$errors->first('discounts')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="seat" class="form-label">Seat:</label>
        <select name="seat" id="seat" class="form-control form-select" required>
    <option value="">Select Seat</option>
    @foreach(["Window" => "Window", "Aisle" => "Aisle", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('seat') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('seat'))
            <div class='error small text-danger'>{{$errors->first('seat')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="seating_section" class="form-label">Seating Section:</label>
        <select name="seating_section" id="seating_section" class="form-control form-select" required>
    <option value="">Select Seating Section</option>
    @foreach(["Forward" => "Forward", "Bulkhead" => "Bulkhead", "Exit Row" => "Exit Row", "Rear" => "Rear", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('seating_section') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('seating_section'))
            <div class='error small text-danger'>{{$errors->first('seating_section')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="special_meals" class="form-label">Special Meals:</label>
        <select name="special_meals" id="special_meals" class="form-control form-select" required>
    <option value="">Select Special Meals</option>
    @foreach(["Regular" => "Regular", "Child Meal" => "Child Meal", "Bland" => "Bland", "Low Residue" => "Low Residue", "Diabetic" => "Diabetic", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('special_meals') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('special_meals'))
            <div class='error small text-danger'>{{$errors->first('special_meals')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="preffered_departure_airport" class="form-label">Preffered Departure Airport:</label>
        <input type="text" name="preffered_departure_airport" id="preffered_departure_airport" class="form-control" value="{{@old('preffered_departure_airport')}}" />
        @if($errors->has('preffered_departure_airport'))
            <div class='error small text-danger'>{{$errors->first('preffered_departure_airport')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="other_travel_preferences" class="form-label">Other Travel Preferences:</label>
        <input type="text" name="other_travel_preferences" id="other_travel_preferences" class="form-control" value="{{@old('other_travel_preferences')}}" />
        @if($errors->has('other_travel_preferences'))
            <div class='error small text-danger'>{{$errors->first('other_travel_preferences')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="medical_alerts" class="form-label">Medical Alerts:</label>
        <input type="text" name="medical_alerts" id="medical_alerts" class="form-control" value="{{@old('medical_alerts')}}" />
        @if($errors->has('medical_alerts'))
            <div class='error small text-danger'>{{$errors->first('medical_alerts')}}</div>
        @endif
    </div>

 <h4 class="mb-3">Hotel Preferences</h4>

    <div class="mb-3 col-md-6">
        <label for="room_type" class="form-label">Room Type:</label>
        <select name="room_type" id="room_type" class="form-control form-select" required>
    <option value="">Select Room Type</option>
    @foreach(["King" => "King", "Queen" => "Queen", "Double" => "Double", "Twin" => "Twin", "Single" => "Single", "Disability" => "Disability", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('room_type') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('room_type'))
            <div class='error small text-danger'>{{$errors->first('room_type')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="smoking" class="form-label">Smoking:</label>
        <select name="smoking" id="smoking" class="form-control form-select" required>
    <option value="">Select Smoking</option>
    @foreach(["Yes" => "Yes", "No" => "No", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('smoking') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('smoking'))
            <div class='error small text-danger'>{{$errors->first('smoking')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-12">
        <label for="foam_pillow" class="form-label">Foam Pillow:</label>
        <select name="foam_pillow" id="foam_pillow" class="form-control form-select" required>
    <option value="">Select Foam Pillow</option>
    @foreach(["Yes" => "Yes", "No" => "No", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('foam_pillow') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('foam_pillow'))
            <div class='error small text-danger'>{{$errors->first('foam_pillow')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="message_to_car_hotel_vendor" class="form-label">Message To Car Hotel Vendor:</label>
        <textarea name="message_to_car_hotel_vendor" id="message_to_car_hotel_vendor" class="form-control" >{{@old('message_to_car_hotel_vendor')}}</textarea>
        @if($errors->has('message_to_car_hotel_vendor'))
            <div class='error small text-danger'>{{$errors->first('message_to_car_hotel_vendor')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="accesibilty_need" class="form-label">Accesibilty Need:</label>
        <select name="accesibilty_need" id="accesibilty_need" class="form-control form-select" required>
    <option value="">Select Accesibilty Need</option>
    @foreach(["Wheelchair" => "Wheelchair", "Blind Accesible" => "Blind Accesible", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('accesibilty_need') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('accesibilty_need'))
            <div class='error small text-danger'>{{$errors->first('accesibilty_need')}}</div>
        @endif
    </div>

     <h4 class="mb-3">Car Rental Preferences</h4>

    <div class="mb-3 col-md-6">
        <label for="car_smoking" class="form-label">Car Smoking:</label>
        <select name="car_smoking" id="car_smoking" class="form-control form-select" required>
    <option value="">Select Car Smoking</option>
    @foreach(["Yes" => "Yes", "No" => "No", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('car_smoking') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('car_smoking'))
            <div class='error small text-danger'>{{$errors->first('car_smoking')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="car_transmission" class="form-label">Car Transmission:</label>
        <select name="car_transmission" id="car_transmission" class="form-control form-select" required>
    <option value="">Select Car Transmission</option>
    @foreach(["Manual" => "Manual", "Automatic" => "Automatic", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('car_transmission') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('car_transmission'))
            <div class='error small text-danger'>{{$errors->first('car_transmission')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-6">
        <label for="car_gps" class="form-label">Car Gps:</label>
        <select name="car_gps" id="car_gps" class="form-control form-select" required>
    <option value="">Select Car Gps</option>
    @foreach(["Yes" => "Yes", "No" => "No", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('car_gps') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('car_gps'))
            <div class='error small text-danger'>{{$errors->first('car_gps')}}</div>
        @endif
    </div>
    <div class="mb-3 col-md-12">
        <label for="message_to_car_rental_vendor" class="form-label">Message To Car Rental Vendor:</label>
        <input type="text" name="message_to_car_rental_vendor" id="message_to_car_rental_vendor" class="form-control" value="{{@old('message_to_car_rental_vendor')}}" />
        @if($errors->has('message_to_car_rental_vendor'))
            <div class='error small text-danger'>{{$errors->first('message_to_car_rental_vendor')}}</div>
        @endif
    </div>

     <h4 class="mb-3">Frequent-Traveler Programs</h4>

     <p>
         <strong>Your Frequent Traveler, Driver, and Hotel Guest Program</strong>
(Please enter programs exactly as they appear on your card, excluding spaces and dashes. Do not add any
additional characters. Do not include the carrier code. If you enter a program incorrectly, we will get a profile error from the reservation system. For example, if your card is printed "AA12345" or "John Doe/12345", then your program number is 12345.)
     </p>

    <div class="mb-3">
        <label for="frequent_traveller_number" class="form-label">Frequent Traveller Number:</label>
        <input type="text" name="frequent_traveller_number" id="frequent_traveller_number" class="form-control" value="{{@old('frequent_traveller_number')}}" />
        @if($errors->has('frequent_traveller_number'))
            <div class='error small text-danger'>{{$errors->first('frequent_traveller_number')}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="frequent_traveller_number_hotel_chain" class="form-label">Frequent Traveller Number Hotel Chain:</label>
        <input type="text" name="frequent_traveller_number_hotel_chain" id="frequent_traveller_number_hotel_chain" class="form-control" value="{{@old('frequent_traveller_number_hotel_chain')}}" />
        @if($errors->has('frequent_traveller_number_hotel_chain'))
            <div class='error small text-danger'>{{$errors->first('frequent_traveller_number_hotel_chain')}}</div>
        @endif
    </div>

    <p>The Transportation Security Authority (TSA) requires us to transmit some information. Providing gender and date of birth is required. If it is not provided, you may be subject to additional screening or denied transport or authorization. For more on TSA privacy policies or to view the records notice and the privacy assessment, see the TSA's web site at WWW.TSA.GOV.</p>
    <div class="mb-3">
        <label for="frequent_traveller_gender" class="form-label">Frequent Traveller Gender:</label>
        <select name="frequent_traveller_gender" id="frequent_traveller_gender" class="form-control form-select" required>
    <option value="">Select Frequent Traveller Gender</option>
    @foreach(["Male" => "Male", "Female" => "Female", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('frequent_traveller_gender') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('frequent_traveller_gender'))
            <div class='error small text-danger'>{{$errors->first('frequent_traveller_gender')}}</div>
        @endif
    </div>

    <em>The DHS redress number is a unique number that helps TSA eliminate watch list
misidentification. If you have a name similar to or the same as a name on the current
terrorist watch list, and have experienced secondary security screenings at the airports, you
will have the option of preventing this in the future by providing your Redress Number at
the time of booking. To apply for a Redress Number go to the TSA web site.</em>
    <div class="mb-3">
        <label for="dhs_redress_number" class="form-label">Dhs Redress Number:</label>
        <input type="text" name="dhs_redress_number" id="dhs_redress_number" class="form-control" value="{{@old('dhs_redress_number')}}" />
        @if($errors->has('dhs_redress_number'))
            <div class='error small text-danger'>{{$errors->first('dhs_redress_number')}}</div>
        @endif
    </div>

<em>On Oct. 4, 2011 the Transportation Security Administration (TSA) launched an expedited
screening pilot program called TSA Pre-Check. CBP has partnered with TSA on this
Department of Homeland Security initiative, which is designed to help TSA focus resources
on higher- risk and unknown passengers while expediting the process for lower- risk and
known passengers whenever possible. The Known Traveler Number is a unique number
assigned to "known travelers" from whom the Federal Government has already conducted a
treat assessment and has determined do not pose a security threat. For more information
about this program, or to locate your known traveler number, click here: http://
www.globalentry.gov/tsa.html.</em>


    <div class="mb-3">
        <label for="tsa_precheck_number" class="form-label">Tsa Precheck Number:</label>
        <input type="text" name="tsa_precheck_number" id="tsa_precheck_number" class="form-control" value="{{@old('tsa_precheck_number')}}" />
        @if($errors->has('tsa_precheck_number'))
            <div class='error small text-danger'>{{$errors->first('tsa_precheck_number')}}</div>
        @endif
    </div>

    <h4 class="mb-3">Passports</h4>


    <div class="mb-3 col-md-4">
        <label for="do_you_have_a_passport" class="form-label">Do you have a passport:</label>
        <select name="do_you_have_a_passport" id="do_you_have_a_passport" class="form-control form-select" required>
    <option value="">Do you have a passport</option>
    @foreach(["Yes" => "Yes", "No" => "No", "unspecified" => "Unspecified"] as $value => $label )
        <option value="{{ $value }}" {{ @old('do_you_have_a_passport') == $value ? "selected" : "" }}>{{ $label }}</option>
    @endforeach
</select>
        @if($errors->has('do_you_have_a_passport'))
            <div class='error small text-danger'>{{$errors->first('do_you_have_a_passport')}}</div>
        @endif
    </div>


    <div class="mb-3 col-md-4">
        <label for="passport_nationality" class="form-label">Passport Nationality:</label>
        <input type="text" name="passport_nationality" id="passport_nationality" class="form-control" value="{{@old('passport_nationality')}}" />
        @if($errors->has('passport_nationality'))
            <div class='error small text-danger'>{{$errors->first('passport_nationality')}}</div>
        @endif
    </div>

    <div class="mb-3 col-md-4">
        <label for="passport_number" class="form-label">Passport Number:</label>
        <input type="text" name="passport_number" id="passport_number" class="form-control" value="{{@old('passport_number')}}" />
        @if($errors->has('passport_number'))
            <div class='error small text-danger'>{{$errors->first('passport_number')}}</div>
        @endif
    </div>




    <div class="mb-3 col-md-4">
        <label for="passport_date_issued" class="form-label">Passport Date Issued:</label>
        <input type="text" name="passport_date_issued" id="passport_date_issued" class="form-control" value="{{@old('passport_date_issued')}}" />
        @if($errors->has('passport_date_issued'))
            <div class='error small text-danger'>{{$errors->first('passport_date_issued')}}</div>
        @endif
    </div>


    <div class="mb-3 col-md-4">
        <label for="passport_date_expiry" class="form-label">Passport Expiry Date:</label>
        <input type="text" name="passport_date_expiry" id="passport_date_expiry" class="form-control" value="{{@old('passport_date_expiry')}}" />
        @if($errors->has('passport_date_expiry'))
            <div class='error small text-danger'>{{$errors->first('passport_date_expiry')}}</div>
        @endif
    </div>

    <div class="mb-3 col-md-4">
        <label for="passport_issued_place" class="form-label">Passport Issue Place:</label>
        <input type="text" name="passport_issued_place" id="passport_issued_place" class="form-control" value="{{@old('passport_issued_place')}}" />
        @if($errors->has('passport_issued_place'))
            <div class='error small text-danger'>{{$errors->first('passport_issued_place')}}</div>
        @endif
    </div>


      <div class="mb-3 col-md-12">
        <label for="passport_issued_country" class="form-label">Passport Issue Country:</label>
        <input type="text" name="passport_issued_country" id="passport_issued_country" class="form-control" value="{{@old('passport_issued_country')}}" />
        @if($errors->has('passport_issued_country'))
            <div class='error small text-danger'>{{$errors->first('passport_issued_country')}}</div>
        @endif
    </div>

    



    <h4 class="mb-3">International Visas </h4>


     <div class="mb-3 col-md-6">
        <label for="visa_nationality" class="form-label">Visa Nationality:</label>
        <input type="text" name="visa_nationality" id="visa_nationality" class="form-control" value="{{@old('visa_nationality')}}" />
        @if($errors->has('visa_nationality'))
            <div class='error small text-danger'>{{$errors->first('visa_nationality')}}</div>
        @endif
    </div>


     <div class="mb-3 col-md-6">
        <label for="visa_type" class="form-label">Visa Type:</label>
        <input type="text" name="visa_type" id="visa_type" class="form-control" value="{{@old('visa_type')}}" />
        @if($errors->has('visa_type'))
            <div class='error small text-danger'>{{$errors->first('visa_type')}}</div>
        @endif
    </div>


     <div class="mb-3 col-md-6">
        <label for="visa_number" class="form-label">Visa Number:</label>
        <input type="text" name="visa_number" id="visa_number" class="form-control" value="{{@old('visa_number')}}" />
        @if($errors->has('visa_number'))
            <div class='error small text-danger'>{{$errors->first('visa_number')}}</div>
        @endif
    </div>


    <div class="mb-3 col-md-6">
        <label for="visa_number_expiration" class="form-label">Expiry Date:</label>
        <input type="text" name="visa_number_expiration" id="visa_number_expiration" class="form-control" value="{{@old('visa_number_expiration')}}" />
        @if($errors->has('visa_number_expiration'))
            <div class='error small text-danger'>{{$errors->first('visa_number_expiration')}}</div>
        @endif
    </div>


            
        </div>

    <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('admin.orders.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Order')</button>
                        </div>

  </form>
        <!-- End Here -->
        </div>



             </div>

        </div>
            

      

                   
              
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection