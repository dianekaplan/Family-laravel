<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


abstract class MyBaseModel extends Model {
        public function nullIfBlank($field)
        {
            return trim($field) !== '' ? $field : null;
        }
    }