@extends("layouts.app")

@section("content")
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create Car.
            </h1>
        </div>


        <div class="flex justify-center pt-20" >
            <form action="/cars" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="block">
                    <input type="file" name="image" >
                    <input type="text" name="name" placeholder="Brand Name..." 
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"/>
                    <input type="text" name="founded" placeholder="Founded Year..." 
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"/>
                    <input type="text" name="description" placeholder="Description..." 
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"/>
                    <button type="submit" 
                        class="bg-green-500 bloack shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        @if ($errors->any()) 
        {{-- $errors is a global variable. --}}
            <div>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </div>
            
        @endif

    </div>
@endsection