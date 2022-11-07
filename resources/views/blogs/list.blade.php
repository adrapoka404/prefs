<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($blogs as $blog)
                <div class="card my-5 m-5">
                    <div class=" font-medium text-blue-400">{{$blog->title}}</div>
                    <div class=" text-xs font-light">{{$blog->created_at}}</div>
                    <div class=" text-justify font-light text-gray-600" >{!!$blog->body!!}</div>
                        <div class="w-1/3 ">Like</div>
                        <div class="w-1/3 ">No like</div>
                        <div class="w-1/3 ">super like</div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
