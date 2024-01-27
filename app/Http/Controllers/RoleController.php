<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Resources\Role\ListRoleResource;
use App\Http\Resources\Role\RoleResource;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\EditRoleRequest;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return App\Http\Resources\Role\ListRoleResource
     */
    public function index()
    {
        return ListRoleResource::collection($this->roleRepository->all());
    }

    /**
     * @param  App\Http\Requests\Role\CreateRoleRequest  $request
     * @return \Illuminate\Routing\ResponseFactory
     */
    public function store(CreateRoleRequest $request)
    {
        try {
            return response()->json([
                'errors' => false,
                'message' => 'Store role successfully!',
                'data' => new RoleResource($this->roleRepository->create($request->getParams()))
            ]);
        } catch (\Exception $e) {
            Log::error('Store role fail: ' . $e->getMessage());
            return response()->json([
                'errors' => true,
                'message' => 'Store role fail: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * @param string $uuid
     * @param  App\Http\Requests\Role\EditRoleRequest  $request
     * @return \Illuminate\Routing\ResponseFactory
     */
    public function update($uuid, EditRoleRequest $request)
    {
        try {
            $role = $this->roleRepository->update($uuid, $request->getParams());

            if (!$role) {
                return response()->json([
                    'errors' => true,
                    'message' => "Can't find this role"
                ]);
            }

            return response()->json([
                'errors' => false,
                'message' => 'Update role successfully!',
                'data' => new RoleResource($role)
            ]);
        } catch (\Exception $e) {
            Log::error('Update role fail: ' . $e->getMessage());
            return response()->json([
                'errors' => true,
                'message' => 'Update role fail: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * @param string $uuid
     * @return \Illuminate\Routing\ResponseFactory
     */
    public function destroy($uuid)
    {
        try {
            $deletedRole = $this->roleRepository->delete($uuid);

            if (!$deletedRole) {    
                return response()->json([
                    'errors' => true,
                    'message' => "Can't find this role"
                ]);
            }

            return response()->json([
                'errors' => false,
                'message' => 'Delete role successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Delete role fail: ' . $e->getMessage());
            return response()->json([
                'errors' => true,
                'message' => 'Delete role fail: ' . $e->getMessage()
            ]);
        }
    }
}
