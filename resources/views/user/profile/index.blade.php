@extends('layouts.user.userdashboard')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@section('title', 'Manage Profile')

@section('content')


    <div class="card">

        <div class="card-body">
                    <div class="container-fluid">

       

 <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://docsman.tirisano-travel.co.za/storage/branding_media/f1c623e4-ba32-48ef-8018-a7ef8c6ec3a1.png" alt="" >
        <h2>Travel Profile Form</h2>
        <p class="lead">Department of Health Education & Behavior</p>
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
          <form class="needs-validation" novalidate>
            <div class="row">

            <h4 class="mb-5">Personal Information</h4>


              <div class="col-md-4 mb-3">
                <label for="name">First name</label>
                <input type="text" class="form-control" id="name" placeholder="" value="{{ Auth::user()->name }}" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="middlename">Middle name</label>
                <input type="text" class="form-control" id="middlename" placeholder="" value="{{ Auth::user()->middlename }}" required>
                <div class="invalid-feedback">
                  Valid middle name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" placeholder="" value="{{ Auth::user()->lastname }}" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

             

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

              <div class="mb-3">
              <label for="country">Country</label>
              <input type="country" class="form-control" id="country" placeholder="country">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Save </button>

        </form>

            <hr class="mb-4">

            <h4 class="mb-3">Home Address</h4>

            <form>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-5">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <button class="btn btn-primary btn-lg btn-block mb-3" type="submit">Save </button>


            <h4 class="mb-3">Emergency Contact</h4>



            <hr class="mb-4">


             <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-5">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>


            


            
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>

        </div>
 </div>
        
    </div>

{{--End CONTAINER--}}
@endsection
@section('script')
    <script>
         initiateFilePond('#user_image')
    </script>
@endsection