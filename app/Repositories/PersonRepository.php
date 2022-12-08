<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\BaseRepository;

/**
 * Class PersonRepository
 * @package App\Repositories
 * @version December 8, 2022, 11:43 am UTC
*/

class PersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'middle_name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Person::class;
    }
}
