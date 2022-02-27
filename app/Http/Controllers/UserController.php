<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\User\UpdateOrCreateRequest as RequestUser;
use App\Models\User;
use App\Repositories\{UsersRepository, rolesRepository};



class UserController extends AppBaseController
{

    /** @var  usersRepository */
    /** @var  rolesRepository */
    private $usersRepository;
    private $rolesRepository;

    public function __construct(UsersRepository $usersRepo, RolesRepository $rolesRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->usersRepository->all();

        return view('user.index')->with('users',  $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create')->with([
            'roles' =>  $this->rolesRepository->all(),
            'user'  =>  new User,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\User\RequestUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestUser $request)
    {
        $user = $this->usersRepository->create($request->prepareInputs());
        // assign role the user
        $user->assignRole($request->role);

        return redirect()->route('users.index', [
            'users' => $this->usersRepository->all()
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

        $user =  $this->usersRepository->find($id);

        return view('user.edit')->with([
            'roles' => $this->rolesRepository->all(),
            'user'  => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUser $request, $id)
    {
        $this->usersRepository->update($request->prepareInputs(), $id);
        
        return redirect()->route('users.index', [
            'users' => $this->usersRepository->all()
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
        $this->usersRepository->delete($id);

        return redirect()->route('users.index', [
            'users' => $this->usersRepository->all()
        ]);
    }
}
