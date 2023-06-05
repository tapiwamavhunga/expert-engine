<?php
/**
 * Gamify - Gamification platform to implement any serious game mechanic.
 *
 * Copyright (c) 2018 by Paco Orozco <paco@pacoorozco.info>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * Some rights reserved. See LICENSE and AUTHORS files.
 *
 * @author             Paco Orozco <paco@pacoorozco.info>
 * @copyright          2018 Paco Orozco
 * @license            GPL-3.0 <http://spdx.org/licenses/GPL-3.0>
 *
 * @link               https://github.com/pacoorozco/gamify-laravel
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('email')->nullable();
            $table->string('nicknane')->nullable();
            $table->enum('gender', ['male', 'female', 'unspecified'])->default('unspecified');

            //Home Address
            $table->string('home_address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();

            //Contact Info

            $table->string('work_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('cellphone')->nullable();

            // Emegency Contact
            $table->string('e_name')->nullable();
            $table->enum('relationship', ['brother', 'sister','cousin','freind', 'unspecified'])->default('unspecified');

            $table->string('e_street')->nullable();
            $table->string('e_city')->nullable();
            $table->string('e_state')->nullable();
            $table->string('e_work_phone')->nullable();
            $table->string('e_home_phone')->nullable();
            $table->string('e_email')->nullable();
            $table->string('e_cellphone')->nullable();

            //Preference

            $table->enum('discounts', ['AAA/CAA', 'government','military','senior', 'unspecified'])->default('unspecified');

             $table->enum('seat', ['Window', 'Aisle', 'unspecified'])->default('unspecified');

             $table->enum('seating_section', ['Forward', 'Bulkhead','Exit Row', 'Rear', 'unspecified'])->default('unspecified');

              $table->enum('special_meals', ['Regular', 'Child Meal','Bland', 'Low Residue', 'Diabetic','unspecified'])->default('unspecified');
             

             $table->string('preffered_departure_airport')->nullable();
             $table->string('other_travel_preferences')->nullable();
             $table->string('medical_alerts')->nullable();

             // Hotel Preferences 

            $table->enum('room_type', ['King', 'Queen','Double', 'Twin', 'Single','Disability','unspecified'])->default('unspecified');

            $table->enum('smoking', ['Yes', 'No','unspecified'])->default('unspecified');

            $table->enum('foam_pillow', ['Yes', 'No','unspecified'])->default('unspecified');

            $table->text('message_to_car_hotel_vendor')->nullable();


           
            $table->enum('accesibilty_need', ['Wheelchair', 'Blind Accesible','unspecified'])->default('unspecified');


             // Car Preferences 

             $table->enum('car_smoking', ['Yes', 'No','unspecified'])->default('unspecified');
             $table->enum('car_transmission', ['Manual', 'Automatic','unspecified'])->default('unspecified');

             $table->enum('car_gps', ['Yes', 'No','unspecified'])->default('unspecified');

             $table->string('message_to_car_rental_vendor')->nullable();
             
             // Freequnt Traveller Program


            $table->string('frequent_traveller_number')->nullable();
            $table->string('frequent_traveller_number_hotel_chain')->nullable();
            $table->enum('frequent_traveller_gender', ['Male', 'Female', 'unspecified'])->default('unspecified');
            $table->string('dhs_redress_number')->nullable();
            $table->string('tsa_precheck_number')->nullable();

            // Passports

          $table->enum('do_you_have_a_passport', ['Yes', 'No','unspecified'])->default('unspecified');

            $table->string('passport_nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_date_issued')->nullable();
            $table->date('passport_date_expiry')->nullable();
            $table->string('passport_issued_place')->nullable();
            $table->string('passport_issued_country')->nullable();

            // Visas 
             $table->string('visa_nationality')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('visa_number')->nullable();
            $table->date('visa_number_expiration')->nullable();




            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('orders');
    }
};
