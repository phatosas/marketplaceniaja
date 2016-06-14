<?php

namespace marketplaceniaja;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type() {
        # Product belongs to type
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\marketplaceniaja\Type');
    }
    public function state() {
        # Product belongs to state
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\marketplaceniaja\State');
    }
}