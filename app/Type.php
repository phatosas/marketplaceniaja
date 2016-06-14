<?php

namespace marketplaceniaja;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function products() {
        # Type has many products
        # Define a one-to-many relationship.
        return $this->hasMany('\marketplaceniaja\Product');
    }
	
	public static function typesForDropDown(){
		
		$types = \marketplaceniaja\Type::orderBy('name', 'ASC')->get();
		$types_for_dropdown = [];
		
		foreach($types as $type){
			$types_for_dropdown[$type->id] = $type->name;
		}
		return $types_for_dropdown;
	}
}
