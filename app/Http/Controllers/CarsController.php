<?php

namespace App\Http\Controllers;

use App\Car;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarsController extends AdminController
{
    private $carsInPage = 10;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \App\Http\Controllers\View|\Illuminate\Contracts\Auth\Factory
     */
    public function index(Request $request)
    {
        $cars = Car::orderBy('created_at', 'desc')->paginate($this->carsInPage);

        return $this->renderAdmin('cars.list', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \App\Http\Controllers\View|\Illuminate\Contracts\Auth\Factory
     */
    public function create()
    {

        if (app('request')->input('id')) {
            $user = User::whereId(app('request')->input('id'))->first();

            return $this->renderAdmin("cars.form", [
                "route" => route("cars.store"),
                'user' => $user
            ]);
        }

        $users = User::all();

        return $this->renderAdmin("cars.form", [
            "route" => route("cars.store"),
            'users' => $users
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
            'make' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'license_plate_number' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all());
        }

        Car::create([
            'make' => $request['make'],
            'model' => $request['model'],
            'colour' => $request['colour'],
            'license_plate_number' => $request['license_plate_number'],
            'is_on_parking' => $request->has('is_on_parking'),
            'user_id' => $request['user_id']
        ]);

        return redirect()->route("cars.index")->withSuccess("Автомобиль успешно добавлен");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \App\Http\Controllers\View|\Illuminate\Contracts\Auth\Factory
     */
    public function edit($id)
    {
        $car = Car::whereId($id)->first();

        $users = User::all();

        return $this->renderAdmin("cars.form", [
            "car" => $car,
            "route" => route("cars.update", ["id" => $id]),
            "update" => true,
            'users' => $users
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
            'make' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'license_plate_number' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->all());
        }

        Car::whereId($id)->update([
            'make' => $request['make'],
            'model' => $request['model'],
            'colour' => $request['colour'],
            'license_plate_number' => $request['license_plate_number'],
            'is_on_parking' => $request->has('is_on_parking'),
            'user_id' => $request['user_id']
        ]);

        return redirect()->route("cars.index")->withSuccess("Автомобиль успешно изменен");
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
        Car::whereId($id)->delete();

        return redirect()->route("cars.index")->withSuccess("Автомобиль успешно удален");
    }

}
