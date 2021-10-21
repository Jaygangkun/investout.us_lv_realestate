<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class propertyStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'city'=>'required|string',
          'address'=>'required|string',
          'zip'=>'required|numeric',
          'state'=>'required|string',
          'easement_claim'=>'required|string',
          'occupy_last'=>'required|string',
          'leased'=>'required|string',
          'occupy_current'=>'required|string',
          'landfill'=>'required|string',
          'flood_plain'=>'required|string',
          'danger_zone'=>'required|string',
          'earthquake_zone'=>'required|string',
          'earth_movement_zone'=>'required|string',
          'unrecorded_easements'=>'required|string',
          'old'=>'required|string',
          'problem'=>'required|string',
          'pest_damage'=>'required|string',
          'pest_license'=>'required|string',
          'structure_problem'=>'required|string',
          'repair'=>'required|string',
          'water_leakage'=>'required|string',
          'structure_changes'=>'required|string',
          'zone_regulataion'=>'required|string',
          'water_source'=>'required|string',
          'sewer_system'=>'required|string',
          'water_sewer_leaks'=>'required|string',
          'plumbing'=>'required|string',
          'toxic_substance'=>'required|string',
          'radon_tested'=>'required|string',
          'fuel_storage'=>'required|string',
          'restrictions'=>'required|string',
          'association_fee_condition'=>'required|string',
          'initiation_fee'=>'required|string',
          'assessments_approved'=>'required|string',
          'litigation'=>'required|string',
          'laws_violation'=>'required|string',
          'equipment_repair'=>'required|string',
          'asbestos'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
          'city.required'=>'Please enter a city of your property',
          'address'=>'Please enter an address of your property',
          'zip'=>'Please enter zipcode of your property',
          'state'=>'Please enter a state for your property'
        ];
    }
}
