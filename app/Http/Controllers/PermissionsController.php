<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\DestroyRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Http\Requests\Permission\StoreRequest;
use App\Models\Permission;
use Gate;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();

        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * To create resource here is the view returned function.
     *
     *@return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage and return to redirect view.
     *
     * @param StoreRequest $request
     * @return
     */
    public function store(StoreRequest $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index');
    }

    /**
     * To edit he specified resource returned to edit view.
     *
     * @param Permission $permission
     * @return Renderable
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Permission $permission
     * @return
     */
    public function update(UpdateRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @return Renderable
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permission.show', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission->delete();

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
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
