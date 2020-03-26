<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsersController extends AdminController
{
    private $usersInPage = 10;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \App\Http\Controllers\View|\Illuminate\Contracts\Auth\Factory
     */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate($this->usersInPage);
        //$cars = DB::select('select * from cars inner join users on cars.user_id = users.id ');
        return $this->renderAdmin('users.list', [
            'users' => $users,
        ]);
    }
//$staff = DB::select('select * from staff where id = :id', ['id' => $id]);//Staff::whereId($id)->first();

    /**
     * Show the form for creating a new resource.
     *
     * @return \App\Http\Controllers\View|\Illuminate\Contracts\Auth\Factory
     */
    public function create()
    {
        return $this->renderAdmin("users.form", [
            "route" => route("users.store")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'min:3|max:255'],
            'gender' => 'required',
            'phone' => ['required', 'unique:users'],
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all());
        }

        User::create([
            'full_name' => $request['full_name'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        return redirect()->route("users.index")->withSuccess("Пользователь успешно добавлен");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \App\Http\Controllers\View|\Illuminate\Contracts\Auth\Factory
     */
    public function edit($id)
    {
        $user = User::whereId($id)->first();

        return $this->renderAdmin("users.form", [
            "user" => $user,
            "route" => route("users.update", ["id" => $id]),
            "update" => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'min:3|max:255'],
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all());
        }

        User::whereId($id)->update([
            'full_name' => $request['full_name'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);

        return redirect()->route("users.index")->withSuccess("Пользователь успешно изменен");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Promocode $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        dd($id);
        User::whereId($id)->delete();
        return redirect()->route("users.index")->withSuccess("Пользователь успешно удален");
    }
}
