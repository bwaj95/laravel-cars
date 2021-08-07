@extends('layouts.app')

@section("content")

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="test-5xl uppercase bold" >
            {{ $car->name }}
        </h1>
        <p>
            {{ $car->headquarter->headquarters ?? "" }}, {{ $car->headquarter->country ?? ""}}.
        </p>
    </div>

    
    
    <div class="w-5/6 py-10">

        <div class="m-auto">
            
            <span class="uppercase text-blue-500 font-bold text-xs italic" >
                Founded: {{ $car->founded }}
            </span>
            
            <p class="text-lg text-gray-700 py-6">
                {{ $car->description }}
            </p>
            
            <ul>
                <p>Models:</p>
                {{-- $car->carModels is accessing the carModels function --}}
                @forelse ($car->carModels as $model) 
                    <li>
                        {{ $model["model_name"] }}
                    </li>
                @empty
                    <p>No cars found.</p>
                @endforelse
            </ul>


            <table>
                <tr>
                    <th>
                        Model
                    </th>
                    <th>
                        Engines
                    </th>
                    <th>
                        Production Date.
                    </th>
                </tr>
                @forelse ($car->carModels as $model)
                <tr>
                    <td>
                        {{ $model->model_name }}
                    </td>
                    <td>
                        @foreach ($car->engines as $engine)
                            @if ($model->id === $engine->model_id)
                            {{ $engine->engine_name }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{ date(
                            "d-m-Y", 
                            strtotime($car->carProductionDate->created_at)
                        ) }}
                    </td>
                </tr>
                    
                @empty
                    <p>No car models found.</p>
                @endforelse
            </table>
            
            <p>
                Product Types:
                @forelse ($car->products as $product)
                    {{ $product->name }}
                @empty
                    No categories found.
                @endforelse
            </p>
            
            <hr class="mt-4 mb-8">
        </div>
            
    </div>

    <div>
        <img src="{{ asset('images/'.$car->image_path) }}" alt="">
    </div>

</div>  


@endsection