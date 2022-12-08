<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Person
 * @package App\Models
 * @version December 8, 2022, 11:43 am UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 */
class Person extends Model
{
    use HasFactory;

    public $table = 'people';
    

    // protected $dates = ['deleted_at'];
    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = false;



    public $fillable = [
        'first_name',
        'last_name',
        'middle_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'middle_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required'
    ];

    
}
