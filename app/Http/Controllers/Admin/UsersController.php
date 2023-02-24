<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\QueryBuilders\UsersQueryBuilder;
use App\Models\User;


use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param UsersQueryBuilder $usersQueryBuilder
     * @return View
     */
    public function index(UsersQueryBuilder $usersQueryBuilder): View
    {
        return \view('admin.users.index', [
            'usersList' => $usersQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UsersQueryBuilder $usersQueryBuilder
     * @param User $user
     * @return View
     *
     */
    public function edit(UsersQueryBuilder $usersQueryBuilder, User $user): View
    {
        return \view('admin.users.edit', [
            'user' => $user,
            'usersList' => $usersQueryBuilder->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user)
    {
        $user = $user->fill($request->validated());

        if ($user->save()) {

            return \redirect()->route('admin.users.index')->with('succses', __('messages.user.edit.sucсess'));
        }
        return \back()->with('error', __('messages.user.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
