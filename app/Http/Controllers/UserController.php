<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\RBAC\Permissions\UserPermissions;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAccess->forUser(auth()->user(), UserPermissions::VIEW);

        $users = User::query()->where(['owner_id' => auth()->id()])->get();

        return view("user.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAccess->forUser(auth()->user(), UserPermissions::CREATE);

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        /**
         * @var User $user
         */
        $user = auth()->user();
        $this->checkAccess->forUser($user, UserPermissions::CREATE);

        $data = $request->validated() + ["owner_id" => $user->id];
        $newUser = User::create($data);

        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->checkAccess->forUser(auth()->user(), UserPermissions::UPDATE);

        $user = User::query()->findOrFail($id);

        return view("user.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $this->checkAccess->forUser(auth()->user(), UserPermissions::UPDATE);

        $user = User::query()->findOrFail($id);
        $data = $request->validated();

        $user->update($data);

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkAccess->forUser(auth()->user(), UserPermissions::DELETE);

        User::destroy($id);

        return redirect()->route("users.index");
    }
}
