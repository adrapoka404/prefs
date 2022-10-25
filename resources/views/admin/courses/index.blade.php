<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 rounded-2xl">
            <div class="bg-white ">
                <x-info />
                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row lg:inline mx-3 py-3">
                        @if ($courses->count() > 0)
                            
                        
                        @foreach ($courses as $course)
                            <div class="md:flex md:flex-col lg:flex-row w-full mx-5 my-3 md:w-1/2 lg:w-full capitalize  hover:shadow-lg rounded-lg border-2 lg:border-0
                            @if ($course->status == 0)
                                hover:shadow-gray-400 hover:border-gray-400
                            @else
                                hover:shadow-green-200 hover:border-green-200
                            @endif
                            ">
                                <div class="w-full flex lg:w-1/5 mx-3 lg:px-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white mx-3 text-white tracking-widest font-light uppercase w-1/2">
                                        Nombre:
                                    </div>
                                    <div class="w-1/2 lg:w-full border-b-2 mx-3 capitalize">
                                        {{ $course->name }}
                                    </div>
                                </div>
                                <div class="w-full flex lg:w-1/5 mx-3 lg:p-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white mx-3 text-white tracking-widest font-light uppercase w-1/2">
                                        Descripción:
                                    </div>
                                    <div class="w-1/2 lg:w-full border-b-2 mx-3 capitalize">
                                        {{ $course->description }}
                                    </div>
                                </div>
                                <div class="w-full flex lg:w-1/5 mx-3 lg:p-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white  mx-3  text-white tracking-widest font-light uppercase w-1/2">
                                        Estado:
                                    </div>
                                    <div class="w-1/2 lg:w-full border-b-2 mx-3 capitalize">
                                        {{ $coyrse->status }}
                                    </div>
                                </div>
                                <div class="w-full flex lg:w-1/5 mx-3 lg:p-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white  mx-3  text-white tracking-widest font-light uppercase w-1/2">
                                        Acciones
                                    </div>
                                    <div class="w-1/2 lg:w-full mx-">
                                        <a href="{{route('positions.edit', $course->id)}}" class="cursor-pointer px-5 py-2 bg-blue-400 text-white hover:bg-blue-700 rounded-full font-semibold">
                                            Editar
                                        </a>
                                        @if ($position->status == 0)
                                                
                                                <a href="{{route('positions.show', $course->id)}}" class="cursor-pointer px-3 py-1 bg-orange-300 text-white hover:bg-orange-500 rounded-full font-semibold">
                                                    Activar
                                                </a>
                                            
                                        @else
                                                {!! Form::open(['url'=> route('positions.destroy', $course->id)]) !!}
                                                    @method('delete')
                                                    {!! Form::submit('Desactivar', ["class"=>"cursor-pointer px-3 py-1 bg-orange-300 text-white hover:bg-orange-500 rounded-full font-semibold"]) !!}
                                                {!! Form::close() !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else 
                            <div class="w-1/2 mx-auto">
                                Aún no hay Cursos para tí.
                            </div>
                        @endif
                    </div>
                    <div>{{ $courses->links() }}</div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
