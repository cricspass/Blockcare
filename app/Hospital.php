<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
        protected $fillable=['name','address',];

        protected $appends = "doctors_count";

        public function getDoctorsCountAttribute() {
            $this->id;
            return Doctor::all()->where('hospital_id', $this->id)->count();
        }

        public function doctors()
        {
            return $this->hasMany('App\Doctor');
        }
}
