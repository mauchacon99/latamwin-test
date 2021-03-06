<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Role\UpdateOrCreate as RequestRole;
use App\Repositories\{PermissionRepository, RolesRepository};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Spatie\Permission\Models\Role;

class RoleController extends AppBaseController
{
    /** @var  rolesRepository */
    /** @var  permissionRepository */
    private $rolesRepository;
    private $permissionRepository;

    public function __construct(RolesRepository $rolesRepo, PermissionRepository $permissionRepo)
    {
        $this->rolesRepository = $rolesRepo;
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!FacadesGate::allows('roles.index')) {
            return abort(401);
        }
        $roles = $this->rolesRepository->all();

        return view('roles.index')->with('roles',  $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!FacadesGate::allows('roles.create')) {
            return abort(401);
        }
        return view('roles.create')->with([
            'role'  =>  new Role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RequestRole  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRole $request)
    {

        $this->rolesRepository->create($request->prepareInputs());

        return redirect()->route('roles.index', [
            'roles' => $this->rolesRepository->all()
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!FacadesGate::allows('roles.edit')) {
            return abort(401);
        }
        $role =  $this->rolesRepository->find($id);

        return view('roles.edit')->with([
            'role'  => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RequestRole  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestRole $request, $id)
    {
        $this->rolesRepository->update($request->prepareInputs(), $id);

        return redirect()->route('roles.index', [
            'roles' => $this->rolesRepository->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!FacadesGate::allows('roles.delete')) {
            return abort(401);
        }
        $this->rolesRepository->delete($id);

        return redirect()->route('roles.index', [
            'roles' => $this->rolesRepository->all()
        ]);
    }

    /**
     * Assign permissions to role.
     *
     * @param  int  $id role
     * @return \Illuminate\Http\Response
     */
    public function assign_permissions($id)
    {
        if (!FacadesGate::allows('roles.permissions')) {
            return abort(401);
        }
        return view('roles.permission')->with([
            'role'  =>   $this->rolesRepository->find($id),
            'permissions' => $this->permissionRepository->all()
        ]);
    }

    /**
     * Sync permissions with role.
     *
     * @param  \Illuminate\Http\Permissions\Request  $request
     * @param  int  $id role
     * @return \Illuminate\Http\Response
     */
    public function insert_permissions(Request $request, $id)
    {
        $role = $this->rolesRepository->find($id);
        $role->Permissions()->sync($request->permissions ?? []);

        Artisan::call('cache:clear');

        return redirect()->route('roles.index', [
            'roles' => $this->rolesRepository->all()
        ]);
    }
}
