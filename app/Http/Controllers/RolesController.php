<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\DestroyRequest;
use App\Http\Requests\Roles\UpdateRequest;
use App\Http\Requests\Roles\StoreRequest;
use App\Models\Permission;
use App\Models\Role;
use Gate;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * To create resource here is the view returned function.
     *
     *@return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage and return to redirect view.
     *
     * @param StoreRequest $request
     * @return
     */
    public function store(StoreRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    /**
     * To edit he specified resource returned to edit view.
     *
     * @param Role $role
     * @return Renderable
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Role $role
     * @return
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Renderable
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequest $request
     * @return Response
     */
    public function massDestroy(DestroyRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
