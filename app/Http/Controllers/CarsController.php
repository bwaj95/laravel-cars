<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(3);

        return view("cars.index", [
            "cars" => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cars.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // //Custom Validation using CreateValidationRequest.
        // $request->validated();

        $request->validate([
            "name" => "required",
            "founded" => "required|integer|min:0|max:2021",
            "description" => "required",
            "image" => "required|mimes:png,jpg, jpeg|max:5048",
        ]);

        $newImageName = time() . "-" . $request->name . "." .
        $request->image->extension();

        $request->image->move(public_path("images"), $newImageName);

        //Call the create method and pass an array.
        //To make this work, write the fillable in the Car.php model.
        $cars = Car::create([
            "name" => $request->input('name'),
            "founded" => $request->input('founded'),
            "description" => $request->input('description'),
            "image_path" => $newImageName,
        ]);

        return redirect("/cars");

        //dd($request);
        //request has (_token from csrf, name, founded, description)
        //Also method, session, previous URl and a lot more.

        // $car = new Car;
        // $car->name = $request->input("name");
        // $car->founded = $request->input("founded");
        // $car->description = $request->input("description");
        // $car->save();

        // //Request all fields.
        // $test = $request->all();

        // //Request EXCEPT
        // $test = $request->except(["_token"]);

        // //Request ONLY
        // $test = $request->only(["name", "founded"]);

        // //Has method
        // $test = $request->has("founded"); //return true of false.

        // //Current path
        // $test = $request->path();

        // if($request->is("cars")){
        //     dd("endpoint is cars!");
        // }

        // //Current Method
        // if($request->method("post")){
        //     dd("Method is POST.");
        // }

        // if($request->isMethod("post")){
        //     dd("Method is POST.");
        // }

        // //Show URL
        // dd($request->url());

        // //Show IP Address.
        // dd($request->ip());

        // //VALIDATION
        // $request->validate([
        //     "name" => "required|unique:cars",
        //     "founded" => "required|integer|min:0|max:2021",
        //     "description" => "required",
        // ]);

        //If valid, proceed.
        //Else, throw a ValidationException and redirect to previous page,
        //with all the validation errors.

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        return view("cars.show", ["car" => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);

        return view("cars.edit", [
            "car" => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {
        //Custom Validation using CreateValidationRequest.
        $request->validated();

        $car = Car::where("id", $id)
            ->update([
                "name" => $request->input("name"),
                "founded" => $request->input("founded"),
                "description" => $request->input("description"),
            ]);

        return redirect("/cars");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::where("id", $id)->delete();
        return redirect("/cars");
    }
}
