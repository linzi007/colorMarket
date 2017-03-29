<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStoreLevelAPIRequest;
use App\Http\Requests\API\UpdateStoreLevelAPIRequest;
use App\Models\StoreLevel;
use App\Repositories\StoreLevelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StoreLevelController
 * @package App\Http\Controllers\API
 */

class StoreLevelAPIController extends AppBaseController
{
    /** @var  StoreLevelRepository */
    private $storeLevelRepository;

    public function __construct(StoreLevelRepository $storeLevelRepo)
    {
        $this->storeLevelRepository = $storeLevelRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/storeLevels",
     *      summary="Get a listing of the StoreLevels.",
     *      tags={"StoreLevel"},
     *      description="Get all StoreLevels",
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
     *                  @SWG\Items(ref="#/definitions/StoreLevel")
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
        $this->storeLevelRepository->pushCriteria(new RequestCriteria($request));
        $this->storeLevelRepository->pushCriteria(new LimitOffsetCriteria($request));
        $storeLevels = $this->storeLevelRepository->all();

        return $this->sendResponse($storeLevels->toArray(), 'Store Levels retrieved successfully');
    }

    /**
     * @param CreateStoreLevelAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/storeLevels",
     *      summary="Store a newly created StoreLevel in storage",
     *      tags={"StoreLevel"},
     *      description="Store StoreLevel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StoreLevel that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StoreLevel")
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
     *                  ref="#/definitions/StoreLevel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStoreLevelAPIRequest $request)
    {
        $input = $request->all();

        $storeLevels = $this->storeLevelRepository->create($input);

        return $this->sendResponse($storeLevels->toArray(), 'Store Level saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/storeLevels/{id}",
     *      summary="Display the specified StoreLevel",
     *      tags={"StoreLevel"},
     *      description="Get StoreLevel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StoreLevel",
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
     *                  ref="#/definitions/StoreLevel"
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
        /** @var StoreLevel $storeLevel */
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            return $this->sendError('Store Level not found');
        }

        return $this->sendResponse($storeLevel->toArray(), 'Store Level retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStoreLevelAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/storeLevels/{id}",
     *      summary="Update the specified StoreLevel in storage",
     *      tags={"StoreLevel"},
     *      description="Update StoreLevel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StoreLevel",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StoreLevel that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StoreLevel")
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
     *                  ref="#/definitions/StoreLevel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStoreLevelAPIRequest $request)
    {
        $input = $request->all();

        /** @var StoreLevel $storeLevel */
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            return $this->sendError('Store Level not found');
        }

        $storeLevel = $this->storeLevelRepository->update($input, $id);

        return $this->sendResponse($storeLevel->toArray(), 'StoreLevel updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/storeLevels/{id}",
     *      summary="Remove the specified StoreLevel from storage",
     *      tags={"StoreLevel"},
     *      description="Delete StoreLevel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StoreLevel",
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
        /** @var StoreLevel $storeLevel */
        $storeLevel = $this->storeLevelRepository->findWithoutFail($id);

        if (empty($storeLevel)) {
            return $this->sendError('Store Level not found');
        }

        $storeLevel->delete();

        return $this->sendResponse($id, 'Store Level deleted successfully');
    }
}
