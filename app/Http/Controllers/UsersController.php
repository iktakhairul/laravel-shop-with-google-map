<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DestroyRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }
    /**
     * To create resource here is the view returned function.
     *
     *@return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage and return to redirect view.
     *
     * @param StoreRequest $request
     * @return
     */
    public function store(StoreRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    /**
     * To edit he specified resource returned to edit view.
     *
     * @param User $user
     * @return Renderable
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Renderable
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->delete();

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
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
