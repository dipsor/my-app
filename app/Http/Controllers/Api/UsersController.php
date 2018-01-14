<?php

namespace App\Http\Controllers\Api;

use App\Users\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Users\Transformers\UserTransformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    private $transformer;

    public function __construct( ){
        $this->transformer = new UserTransformer();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return new Response($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|unique:users|email',
           'password' => 'confirmed|min:6',
        ]);

        $userData = [
            'name'  =>  $request->get('name'),
            'email'  => $request->get('email')
        ];

        if (!is_null($request->get('password'))) {
            $userData['password'] = $request->get('password');
        }

        $user = $this->handleRoles($request, User::create($userData));

        return response($this->transformer->transform($user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->transformer->transform(User::find($id)));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->get('id'));

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed|min:6',
        ]);

        $userData = [
            'name'  =>  $request->get('name'),
            'email'  => $request->get('email')
        ];

        if (!is_null($request->get('password'))) {
            $userData['password'] = $request->get('password');
        }

        $user->update($userData);
        $user->roles()->detach();

        $user = $this->handleRoles($request, $user);

        return response($this->transformer->transform($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response($user);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return User
     */
    private function handleRoles(Request $request, User $user)
    {
        $roles = $request->get('roles');

        if (isset($roles) && is_array($roles)) {
            $user->assignRole($roles);
        }

        return $user;
    }

    /**
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updateGeneralInfo(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $userData = [
            'name'  =>  $request->get('name'),
            'email'  => $request->get('email')
        ];

        $user->update($userData);

        return response('User updated', 200);
    }

    /**
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updatePassword(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        if (!Hash::check($request->get('old'), $user->password)) {
            return response('wrong password', 403);
        }

        $this->validate($request, [
            'old' => 'required',
            'newPassword' => 'confirmed|min:6',
        ]);

        $userData = [
          'password' => $request->get('newPassword')
        ];

        $user->update($userData);

        return response('Password updated', 200);
    }


}
