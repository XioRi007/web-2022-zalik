<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Repositories\PersonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Http\Response as HttpResponse;
use Response;

class PersonController extends AppBaseController
{
    /** @var PersonRepository $personRepository*/
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * Display a listing of the Person.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $persons = $this->personRepository->all();

        return view('persons.index')
            ->with('persons', $persons);
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePersonRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonRequest $request)
    {
        $input = $request->all();

        $person = $this->personRepository->create($input);

        Flash::success('Person saved successfully.');

        return redirect(route('persons.index'));
    }

    /**
     * Display the specified Person.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');
            return response([
                'message' => "Not found"
            ], HttpResponse::HTTP_NOT_FOUND);
        }
        $response = response([
                            'data'=>$person,
                            ], HttpResponse::HTTP_OK);        
        return $response;
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('persons.index'));
        }

        return view('persons.edit')->with('person', $person);
    }

    /**
     * Update the specified Person in storage.
     *
     * @param int $id
     * @param UpdatePersonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonRequest $request)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('persons.index'));
        }

        $person = $this->personRepository->update($request->all(), $id);

        Flash::success('Person updated successfully.');
        $response = response([
                            'data'=>$person,
                            ], HttpResponse::HTTP_OK);        
        return $response;
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $person = $this->personRepository->find($id);

        if (empty($person)) {
            Flash::error('Person not found');
            return response([
                'message' => "Not found"
            ], HttpResponse::HTTP_NOT_FOUND);
        }

        $this->personRepository->delete($id);

        Flash::success('Person deleted successfully.');
        $response = Response([
            'data'=>$person,
            ], HttpResponse::HTTP_OK); 

        return $response;
    }
}
