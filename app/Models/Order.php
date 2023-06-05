<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model {
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ["name", "lastname", "middlename", "email", "nicknane", "gender", "home_address", "street", "city", "state", "postal_code", "country", "work_phone", "home_phone", "work_email", "cellphone", "e_name", "relationship", "e_street", "e_city", "e_state", "e_work_phone", "e_home_phone", "e_email", "e_cellphone", "discounts", "seat", "seating_section", "special_meals", "preffered_departure_airport", "other_travel_preferences", "medical_alerts", "room_type", "smoking", "foam_pillow", "message_to_car_hotel_vendor", "accesibilty_need", "car_smoking", "car_transmission", "car_gps", "message_to_car_rental_vendor", "frequent_traveller_number", "frequent_traveller_number_hotel_chain", "frequent_traveller_gender", "dhs_redress_number", "tsa_precheck_number", "do_you_have_a_passport","passport_nationality", "passport_number", "passport_date_issued", "passport_date_expiry", "passport_issued_place", "passport_issued_country", "visa_nationality", "visa_type", "visa_number", "visa_number_expiration"];

}


