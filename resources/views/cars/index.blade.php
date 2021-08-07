@extends("layouts.app")

@section("content")
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="test-5xl uppercase bold" >
                Cars
            </h1>
        </div>

        <div class="pt-10">
            <a href="cars/create" class="border-b-2 pb-2 border-dotted text-gray-500">
                Add a new Car &rarr;
            </a>
        </div>
        
        
        <div class="w-5/6 py-10">
            @foreach ($cars as $car)

            <div class="m-auto">
                <div>
                    <a href="/cars/{{ $car->id }}/edit">
                        Edit &rarr;
                    </a>
                </div>
                <span class="uppercase text-blue-500 font-bold text-xs italic" >
                    Founded: {{ $car->founded }}
                </span>
                <h2 class="text-gray-700 text-5xl">
                    <a href="/cars/{{ $car->id }}">
                        {{ $car->name }}
                    </a>
                </h2>
                <p class="text-lg text-gray-700 py-6">
                    {{ $car->description }}
                </p>
                
                <form action="/cars/{{ $car->id }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete &rarr;</button>
                    {{-- 
                        The CSRF token needs to be sent along with the 
                        DELETE type request to perform a deletion.
                        So we use a form to SUBMIT such a request.
                        Can't do with <a> tag.
                    --}}
                </form>
                
                <hr class="mt-4 mb-8">
            </div>
                
            @endforeach
        </div>

        {{ $cars->links() }}

    </div>

    
@endsection

