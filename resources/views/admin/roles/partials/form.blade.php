@if ($errors->any())
    <x-row-two>
        <x-slot name='label'>
            Errores
        </x-slot>
        <x-slot name='input'>
            <x-validation-error />
        </x-slot>
    </x-row-two>
@endif
<x-row-two>
    <x-slot name='label'>
        Nombre
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('name', isset($role) ? $role->name :old('name'), [
            'class'         => 'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder'   => 'CEO'
        ]) !!}
    </x-slot>
</x-row-two>
<x-row-two>
    <x-slot name='label'>
        Permisos
    </x-slot>
    <x-slot name='input'>
        <div class="block my-2">
            <label>
            {!! Form::checkbox('chekAll', 0, 0, ["id" => 'checkAll']) !!}
            Seleccionar todos los permisos
        </label>
        </div>
        <div class="flex flex-wrap mx-2">
        @foreach ($permissions as $permission)
        <div>
        <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ["class"=> "thecheck"]) !!}
                {{$permission->name}}
            </label>
        </div>  
        @endforeach
    </div>
    </x-slot>
</x-row-two>

@section('jquery')
    <script>
        CKEDITOR.replace('body');
        $(document).ready(function() {
            $("#checkAll").on('change', function(){
                $(".thecheck").prop('checked', $(this).is(':checked'))
            })
            console.log('adx in form');
            $("#btnSave").on("click", function() {
                $("#formCreate").submit();
            })
        })
    </script>
@endsection
