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
        Título
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('title', isset($blog) ? $blog->title :old('blog.title'), [
            'class'         => 'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder'   => 'Manual de usuario v3.2'
        ]) !!}
    </x-slot>
</x-row-two>
<x-row-two>
    <x-slot name='label'>
        Permitir descarga por roles
    </x-slot>
    <x-slot name='input'>
        <div class="block my-2">
            <label>
            {!! Form::checkbox('chekAll', 0, 0, ["id" => 'checkAll']) !!}
            Seleccionar todos los roles
        </label>
        </div>
        <div class="flex flex-wrap">
            @foreach ($roles as $role)
            <div class="flex mx-5">
                <label>
                    {!! Form::checkbox('roles[]', $role->id, null, ["class" => "thecheck"]) !!}
                    {{$role->name}}
                </label>
            </div>
            @endforeach
        </div>
    </x-slot>
</x-row-two>
<x-row-two>
    <x-slot name='label'>
        EstArchivoado
    </x-slot>
    <x-slot name='input'>
        {!! Form::file('file', []) !!}
    </x-slot>
</x-row-two>
<x-row-two>
    <x-slot name='label'>
        Estado
    </x-slot>
    <x-slot name='input'>
        {!! Form::select('status', ['0' => 'Desactivado', '1'=>"Activado"], isset($document) ? $document->status :old('status'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Estado',
        ]) !!}
    </x-slot>
</x-row-two>

@section('jquery')
    <script>
        
        $(document).ready(function() {
            $("#checkAll").on('change', function(){
                $(".thecheck").prop('checked', $(this).is(':checked'))
            })
            
            $("#btnSave").on("click", function() {
                $("#formCreate").submit();
            })
        })
    </script>
@endsection
