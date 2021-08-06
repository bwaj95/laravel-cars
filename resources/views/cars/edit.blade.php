@extends("layouts.app")

@section("content")
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Edit Car.
            </h1>
        </div>


        <div class="flex justify-center pt-20" >
            <form action="/cars/{{ $car->id }}" method="POST">
                @csrf
                @method("PUT")
                <div class="block">
                    <input type="text" name="name" 
                    value={{ $car->name }}
                    >
                    <input type="text" name="founded" 
                    value={{ $car->founded }}
                    >
                    <input type="text" name="description" 
                    value={{ $car->description }}
                    >
                    <button type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection