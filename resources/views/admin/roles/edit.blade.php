<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role ' . $role->name ) }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 rounded-2xl">
            <div class="bg-white ">
                {!! Form::model($role, ['url' => route('admin_roles.update', $role), 'id' => 'formCreate', 'autocomplete' => 'off', 'method' => 'put']) !!}
                @include('admin/roles/partials/form')

                <x-row-two>
                    <x-slot name='label'>
                        <small class=" text-red-300"> Todos los campos son obligatorios</small>
                    </x-slot>
                    <x-slot name='input'>
                        <div class="flex flex-row text-center">
                            <div class="w-1/2">
                                <x-button-save>
                                    <x-slot name='id'>btnSave</x-slot>
                                    <x-slot name='txt'>Editar</x-slot>
                                </x-button-save>
                            </div>
                            <div class="w-1/2">
                                <x-link-cancel>
                                    <x-slot name='id'>btnEmployeeCancel</x-slot>
                                    <x-slot name='txt'>Cancelar</x-slot>
                                    <x-slot name='href'>{{ route('admin_roles.index') }}</x-slot>
                                </x-link-cancel>
                            </div>


                        </div>
                    </x-slot>
                </x-row-two>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
