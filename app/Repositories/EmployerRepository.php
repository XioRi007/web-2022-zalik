<?php

namespace App\Repositories;

use App\Models\Employer;
use App\Repositories\BaseRepository;

/**
 * Class EmployerRepository
 * @package App\Repositories
 * @version December 8, 2022, 10:06 am UTC
*/

class EmployerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'card_code'
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
        return Employer::class;
    }
}
