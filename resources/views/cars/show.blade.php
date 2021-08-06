@extends('layouts.app')

@section("content")

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="test-5xl uppercase bold" >
            {{ $car->name }}
        </h1>
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
            
            
            <hr class="mt-4 mb-8">
        </div>
            
    </div>

</div>  


@endsection