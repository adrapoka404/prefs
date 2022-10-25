<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 rounded-2xl">
            <div class="bg-white ">
                <x-info />
                <div class="flex flex-col">
                    
                    <div class=" text-right py-5 mx-3">
                        <a href="{{ route('admin_blog.create') }}"
                            class="w-10 bg-green-300 hover:bg-green-600 px-3 py-1 mx-2 rounded-lg font-bold text-2xl text-white">+</a>
                    </div>
                    <div
                        class="hidden lg:flex lg:flex-row w-full bg-gray-500 mx-3 text-white tracking-widest font-light uppercase">
                        <div class="w-1/5">ID</div>
                        <div class="w-1/5">Título</div>
                        <div class="w-1/5">Estado</div>
                        <div class="w-1/5">Acciones</div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:inline mx-3 py-3">
                        @if ($blogs->count() > 0)
                            
                        
                        @foreach ($blogs as $blog)
                            <div class="md:flex md:flex-col lg:flex-row w-full mx-5 my-3 md:w-1/2 lg:w-full capitalize  hover:shadow-lg rounded-lg border-2 lg:border-0
                            @if ($blog->status == 0)
                                hover:shadow-gray-400 hover:border-gray-400
                            @else
                                hover:shadow-green-200 hover:border-green-200
                            @endif
                            ">
                                <div class="w-full flex lg:w-1/5 mx-3 lg:px-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white mx-3 text-white tracking-widest font-light uppercase w-1/2">
                                        ID:
                                    </div>
                                    <div class="w-1/2 lg:w-full border-b-2 mx-3 capitalize">
                                        {{ $blog->id }}
                                    </div>
                                </div>
                                <div class="w-full flex lg:w-1/5 mx-3 lg:p-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white mx-3 text-white tracking-widest font-light uppercase w-1/2">
                                        Contenido:
                                    </div>
                                    <div class="w-1/2 lg:w-full border-b-2 mx-3 capitalize">
                                        {{ $blog->title }}
                                    </div>
                                </div>
                                <div class="w-full flex lg:w-1/5 mx-3 lg:p-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white  mx-3  text-white tracking-widest font-light uppercase w-1/2">
                                        Estado:
                                    </div>
                                    <div class="w-1/2 lg:w-full border-b-2 mx-3 capitalize">
                                        {{ $blog->status }}
                                    </div>
                                </div>
                                <div class="w-full flex lg:w-1/5 mx-3 lg:p-3">
                                    <div class=" block lg:hidden bg-gray-500 border-b-2 border-b-white  mx-3  text-white tracking-widest font-light uppercase w-1/2">
                                        Acciones
                                    </div>
                                    <div class="w-1/2 lg:w-full mx-">
                                        <a href="{{route('admin_blog.edit', $blog->id)}}" class="cursor-pointer px-5 py-2 bg-blue-400 text-white hover:bg-blue-700 rounded-full font-semibold">
                                            Editar
                                        </a>
                                        @if ($blog->status == 0)
                                                
                                                <a href="{{route('admin_blog.show', $blog->id)}}" class="cursor-pointer px-3 py-1 bg-orange-300 text-white hover:bg-orange-500 rounded-full font-semibold">
                                                    Activar
                                                </a>
                                            
                                        @else
                                                {!! Form::open(['url'=> route('admin_blog.destroy', $blog->id)]) !!}
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
                                Aún no hay elementos en la BD, crea una 
                                <a href="{{route('admin_blog.create')}}" class="cursor-pointer text-blue-300 font-medium">
                                     nueva publicación
                                </a>
                            </div>
                        @endif
                    </div>
                    <div>{{ $blogs->links() }}</div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
