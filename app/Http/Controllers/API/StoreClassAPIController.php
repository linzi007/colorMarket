<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStoreClassAPIRequest;
use App\Http\Requests\API\UpdateStoreClassAPIRequest;
use App\Models\StoreClass;
use App\Repositories\StoreClassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StoreClassController
 * @package App\Http\Controllers\API
 */

class StoreClassAPIController extends AppBaseController
{
    /** @var  StoreClassRepository */
    private $storeClassRepository;

    public function __construct(StoreClassRepository $storeClassRepo)
    {
        $this->storeClassRepository = $storeClassRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/storeClasses",
     *      summary="Get a listing of the StoreClasses.",
     *      tags={"StoreClass"},
     *      description="Get all StoreClasses",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/StoreClass")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->storeClassRepository->pushCriteria(new RequestCriteria($request));
        $this->storeClassRepository->pushCriteria(new LimitOffsetCriteria($request));
        $storeClasses = $this->storeClassRepository->all();

        return $this->sendResponse($storeClasses->toArray(), 'Store Classes retrieved successfully');
    }

    /**
     * @param CreateStoreClassAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/storeClasses",
     *      summary="Store a newly created StoreClass in storage",
     *      tags={"StoreClass"},
     *      description="Store StoreClass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StoreClass that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StoreClass")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/StoreClass"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStoreClassAPIRequest $request)
    {
        $input = $request->all();

        $storeClasses = $this->storeClassRepository->create($input);

        return $this->sendResponse($storeClasses->toArray(), 'Store Class saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/storeClasses/{id}",
     *      summary="Display the specified StoreClass",
     *      tags={"StoreClass"},
     *      description="Get StoreClass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StoreClass",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/StoreClass"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var StoreClass $storeClass */
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            return $this->sendError('Store Class not found');
        }

        return $this->sendResponse($storeClass->toArray(), 'Store Class retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStoreClassAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/storeClasses/{id}",
     *      summary="Update the specified StoreClass in storage",
     *      tags={"StoreClass"},
     *      description="Update StoreClass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StoreClass",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StoreClass that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StoreClass")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/StoreClass"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStoreClassAPIRequest $request)
    {
        $input = $request->all();

        /** @var StoreClass $storeClass */
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            return $this->sendError('Store Class not found');
        }

        $storeClass = $this->storeClassRepository->update($input, $id);

        return $this->sendResponse($storeClass->toArray(), 'StoreClass updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/storeClasses/{id}",
     *      summary="Remove the specified StoreClass from storage",
     *      tags={"StoreClass"},
     *      description="Delete StoreClass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StoreClass",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var StoreClass $storeClass */
        $storeClass = $this->storeClassRepository->findWithoutFail($id);

        if (empty($storeClass)) {
            return $this->sendError('Store Class not found');
        }

        $storeClass->delete();

        return $this->sendResponse($id, 'Store Class deleted successfully');
    }
}
