<?php

namespace App\Http\Controllers;

use App\DataTables\StoreLevelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStoreLevelRequest;
use App\Http\Requests\UpdateStoreLevelRequest;
use App\Repositories\StoreLevelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StoreLevelController extends AppBaseController
{
    /** @var  StoreLevelRepository */
    private $storeLevelRepository;

    public function __construct(StoreLevelRepository $storeLevelRepo)
    {
        $this->storeLevelRepository = $storeLevelRepo;
    }

    /**
     * Display a listing of the StoreLevel.
     *
     * @param StoreLevelDataTable $storeLevelDataTable
     * @return Response
     */
    public function index(StoreLevelDataTable $storeLevelDataTable)
    {
        return $storeLevelDataTable->render('store_levels.index');
    }

    /**
     * Show the form for creating a new StoreLevel.
     *
     * @return Response
     */
    public function create()
    {
        return view('store_levels.create');
    }

    /**
     * Store a newly created StoreLevel in storage.
     *
     * @param CreateStoreLevelRequest $request
     *
     * @return Response
     */
    public function store(CreateStoreLevelRequest $request)
    {
        $input = $request->all();

        $storeLevel = $this->storeLevelRepository->create($input);

        Flash::success('Store Level saved successfully.');

        return redirect(route('storeLevels.index'));
    }

    /**
     * Display the specified StoreLevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            Flash::error('Store Level not found');

            return redirect(route('storeLevels.index'));
        }

        return view('store_levels.show')->with('storeLevel', $storeLevel);
    }

    /**
     * Show the form for editing the specified StoreLevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            Flash::error('Store Level not found');

            return redirect(route('storeLevels.index'));
        }

        return view('store_levels.edit')->with('storeLevel', $storeLevel);
    }

    /**
     * Update the specified StoreLevel in storage.
     *
     * @param  int              $id
     * @param UpdateStoreLevelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoreLevelRequest $request)
    {
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            Flash::error('Store Level not found');

            return redirect(route('storeLevels.index'));
        }

        $storeLevel = $this->storeLevelRepository->update($request->all(), $id);

        Flash::success('Store Level updated successfully.');

        return redirect(route('storeLevels.index'));
    }

    /**
     * Remove the specified StoreLevel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            Flash::error('Store Level not found');

            return redirect(route('storeLevels.index'));
        }

        $this->storeLevelRepository->delete($id);

        Flash::success('Store Level deleted successfully.');

        return redirect(route('storeLevels.index'));
    }
}
