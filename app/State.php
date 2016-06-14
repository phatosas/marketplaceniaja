<?php

namespace marketplaceniaja;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function products() {
        # State has many products
        # Define a one-to-many relationship.
        return $this->hasMany('\marketplaceniaja\Product');
    }
	
		public static function statesForDropDown(){
		
		$states = \marketplaceniaja\State::orderBy('name', 'ASC')->get();
		$states_for_dropdown = [];
		
		foreach($states as $state){
			$states_for_dropdown[$state->id] = $state->name;
		}
		return $states_for_dropdown;
	}
}
