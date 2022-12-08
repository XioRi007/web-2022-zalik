<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employer
 * @package App\Models
 * @version December 8, 2022, 10:06 am UTC
 *
 * @property string $name
 * @property string $address
 * @property string $card_code
 */
class Employer extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address',
        'card_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'card_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'card_code' => 'required'
    ];

    
}
