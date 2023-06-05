<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrdersController extends Controller {

    public function __construct() {
		$this->authorizeResource(Order::class, 'order');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $orders = Order::query();
		$orders->where('user_id', auth()->id());

        if(!empty($request->search)) {
			$orders->where('name', 'like', '%' . $request->search . '%');
		}

        $orders = $orders->paginate(10);

        return view('user.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('user.orders.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["name" => "required", "gender" => "required", "relationship" => "required", "discounts" => "required", "seat" => "required", "seating_section" => "required", "special_meals" => "required", "room_type" => "required", "smoking" => "required", "foam_pillow" => "required", "accesibilty_need" => "required", "car_smoking" => "required", "car_transmission" => "required", "car_gps" => "required", "frequent_traveller_gender" => "required"]);

        try {

            $order = new Order();
            $order->user_id = auth()->id();
		$order->name = $request->name;
		$order->lastname = $request->lastname;
		$order->middlename = $request->middlename;
		$order->email = $request->email;
		$order->nicknane = $request->nicknane;
		$order->gender = $request->gender;
		$order->home_address = $request->home_address;
		$order->street = $request->street;
		$order->city = $request->city;
		$order->state = $request->state;
		$order->postal_code = $request->postal_code;
		$order->country = $request->country;
		$order->work_phone = $request->work_phone;
		$order->home_phone = $request->home_phone;
		$order->work_email = $request->work_email;
		$order->cellphone = $request->cellphone;
		$order->e_name = $request->e_name;
		$order->relationship = $request->relationship;
		$order->e_street = $request->e_street;
		$order->e_city = $request->e_city;
		$order->e_state = $request->e_state;
		$order->e_work_phone = $request->e_work_phone;
		$order->e_home_phone = $request->e_home_phone;
		$order->e_email = $request->e_email;
		$order->e_cellphone = $request->e_cellphone;
		$order->discounts = $request->discounts;
		$order->seat = $request->seat;
		$order->seating_section = $request->seating_section;
		$order->special_meals = $request->special_meals;
		$order->preffered_departure_airport = $request->preffered_departure_airport;
		$order->other_travel_preferences = $request->other_travel_preferences;
		$order->medical_alerts = $request->medical_alerts;
		$order->room_type = $request->room_type;
		$order->smoking = $request->smoking;
		$order->foam_pillow = $request->foam_pillow;
		$order->message_to_car_hotel_vendor = $request->message_to_car_hotel_vendor;
		$order->accesibilty_need = $request->accesibilty_need;
		$order->car_smoking = $request->car_smoking;
		$order->car_transmission = $request->car_transmission;
		$order->car_gps = $request->car_gps;
		$order->message_to_car_rental_vendor = $request->message_to_car_rental_vendor;
		$order->frequent_traveller_number = $request->frequent_traveller_number;
		$order->frequent_traveller_number_hotel_chain = $request->frequent_traveller_number_hotel_chain;
		$order->frequent_traveller_gender = $request->frequent_traveller_gender;
		$order->dhs_redress_number = $request->dhs_redress_number;
		$order->tsa_precheck_number = $request->tsa_precheck_number;

		$order->do_you_have_a_passport = $request->do_you_have_a_passport;
		 $order->passport_nationality = $request->passport_nationality;
		$order->passport_number = $request->passport_number;
		 //$order->passport_date_issued = $request->passport_date_issued;
		// $order->passport_date_expiry = $request->passport_date_expiry;
		 $order->passport_issued_place = $request->passport_issued_place;
		$order->passport_issued_country = $request->passport_issued_country;
		$order->visa_nationality = $request->visa_nationality;
		$order->visa_type = $request->visa_type;
		$order->visa_number = $request->visa_number;
		//$order->visa_number_expiration = $request->visa_number_expiration;



            $order->save();

            return redirect()->route('user.orders.index', [])->with('success', __('Order created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('user.orders.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,) {

        return view('user.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order,) {

        return view('user.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order,) {

        $request->validate(["name" => "required", "gender" => "required", "relationship" => "required", "discounts" => "required", "seat" => "required", "seating_section" => "required", "special_meals" => "required", "room_type" => "required", "smoking" => "required", "foam_pillow" => "required", "accesibilty_need" => "required", "car_smoking" => "required", "car_transmission" => "required", "car_gps" => "required", "frequent_traveller_gender" => "required"]);

        try {
            $order->name = $request->name;
		$order->lastname = $request->lastname;
		$order->middlename = $request->middlename;
		$order->email = $request->email;
		$order->nicknane = $request->nicknane;
		$order->gender = $request->gender;
		$order->home_address = $request->home_address;
		$order->street = $request->street;
		$order->city = $request->city;
		$order->state = $request->state;
		$order->postal_code = $request->postal_code;
		$order->country = $request->country;
		$order->work_phone = $request->work_phone;
		$order->home_phone = $request->home_phone;
		$order->work_email = $request->work_email;
		$order->cellphone = $request->cellphone;
		$order->e_name = $request->e_name;
		$order->relationship = $request->relationship;
		$order->e_street = $request->e_street;
		$order->e_city = $request->e_city;
		$order->e_state = $request->e_state;
		$order->e_work_phone = $request->e_work_phone;
		$order->e_home_phone = $request->e_home_phone;
		$order->e_email = $request->e_email;
		$order->e_cellphone = $request->e_cellphone;
		$order->discounts = $request->discounts;
		$order->seat = $request->seat;
		$order->seating_section = $request->seating_section;
		$order->special_meals = $request->special_meals;
		$order->preffered_departure_airport = $request->preffered_departure_airport;
		$order->other_travel_preferences = $request->other_travel_preferences;
		$order->medical_alerts = $request->medical_alerts;
		$order->room_type = $request->room_type;
		$order->smoking = $request->smoking;
		$order->foam_pillow = $request->foam_pillow;
		$order->message_to_car_hotel_vendor = $request->message_to_car_hotel_vendor;
		$order->accesibilty_need = $request->accesibilty_need;
		$order->car_smoking = $request->car_smoking;
		$order->car_transmission = $request->car_transmission;
		$order->car_gps = $request->car_gps;
		$order->message_to_car_rental_vendor = $request->message_to_car_rental_vendor;
		$order->frequent_traveller_number = $request->frequent_traveller_number;
		$order->frequent_traveller_number_hotel_chain = $request->frequent_traveller_number_hotel_chain;
		$order->frequent_traveller_gender = $request->frequent_traveller_gender;
		$order->dhs_redress_number = $request->dhs_redress_number;
		$order->tsa_precheck_number = $request->tsa_precheck_number;
            $order->save();

            return redirect()->route('user.orders.index', [])->with('success', __('Order edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('user.orders.edit', compact('order'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order,) {

        try {
            $order->delete();

            return redirect()->route('user.orders.index', [])->with('success', __('Order deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('user.orders.index', [])->with('error', 'Cannot delete Order: ' . $e->getMessage());
        }
    }

    
}
