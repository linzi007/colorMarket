<?php

namespace App\Http\Controllers;

use App\DataTables\StoreClassDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStoreClassRequest;
use App\Http\Requests\UpdateStoreClassRequest;
use App\Repositories\StoreClassRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StoreClassController extends AppBaseController
{
    /** @var  StoreClassRepository */
    private $storeClassRepository;

    public function __construct(StoreClassRepository $storeClassRepo)
    {
        $this->storeClassRepository = $storeClassRepo;
    }

    /**
     * Display a listing of the StoreClass.
     *
     * @param StoreClassDataTable $storeClassDataTable
     * @return Response
     */
    public function index(StoreClassDataTable $storeClassDataTable)
    {
        return $storeClassDataTable->render('store_classes.index');
    }

    /**
     * Show the form for creating a new StoreClass.
     *
     * @return Response
     */
    public function create()
    {
        return view('store_classes.create');
    }

    /**
     * Store a newly created StoreClass in storage.
     *
     * @param CreateStoreClassRequest $request
     *
     * @return Response
     */
    public function store(CreateStoreClassRequest $request)
    {
        $input = $request->all();

        $storeClass = $this->storeClassRepository->create($input);

        Flash::success('Store Class saved successfully.');

        return redirect(route('storeClasses.index'));
    }

    /**
     * Display the specified StoreClass.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            Flash::error('Store Class not found');

            return redirect(route('storeClasses.index'));
        }

        return view('store_classes.show')->with('storeClass', $storeClass);
    }

    /**
     * Show the form for editing the specified StoreClass.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            Flash::error('Store Class not found');

            return redirect(route('storeClasses.index'));
        }

        return view('store_classes.edit')->with('storeClass', $storeClass);
    }

    /**
     * Update the specified StoreClass in storage.
     *
     * @param  int              $id
     * @param UpdateStoreClassRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoreClassRequest $request)
    {
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            Flash::error('Store Class not found');

            return redirect(route('storeClasses.index'));
        }

        $storeClass = $this->storeClassRepository->update($request->all(), $id);

        Flash::success('Store Class updated successfully.');

        return redirect(route('storeClasses.index'));
    }

    /**
     * Remove the specified StoreClass from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            Flash::error('Store Class not found');

            return redirect(route('storeClasses.index'));
        }

        $this->storeClassRepository->delete($id);

        Flash::success('Store Class deleted successfully.');

        return redirect(route('storeClasses.index'));
    }
}
