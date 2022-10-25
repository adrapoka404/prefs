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
<x-row-three>
    <x-slot name='label'>
        Nombre / Estado
    </x-slot>
    <x-slot name='one'>
        {!! Form::text('position[name]', isset($position) ? $position->name :old('position.name'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'CEO',
        ]) !!}
    </x-slot>
    <x-slot name='two'>
        {!! Form::select('position[status]', ['0' => 'Desactivado', '1'=>"Activado"], isset($position) ? $position->status :old('position.status'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Estado',
        ]) !!}
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        Descripción del puesto:
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('position[description]', isset($position) ? $position->description :old('position.description'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium architecto ut optio expedita, recusandae iste possimus natus a atque minus nesciunt quae nemo sint eos provident, nisi sequi numquam totam?',
            'rows' => '3'
        ]) !!}
    </x-slot>
</x-row-two>
@section('jquery')
    <script>
        $(document).ready(function() {
            $("#btnSave").on("click", function() {
                $("#formCreate").submit();
            })
        })
    </script>
@endsection
