<?php

namespace App\Models\Security;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $table     = "user";
    public $incrementing = false;
    protected $fillable  = [
        "id", "active", "role_code", "employee_id", "display_name", "default_location_code", "default_company_code"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fill(array $attributes) {
        parent::fill($attributes);

        if (array_key_exists("employee_id", $attributes) && $attributes["employee_id"] == "none") {
            $this->employee_id = NULL;
        }
    }

}
