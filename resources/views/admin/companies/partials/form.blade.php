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
        {!! Form::text('company[name]', isset($company) ? $company->name :old('company.name'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Área 404',
        ]) !!}
    </x-slot>
    <x-slot name='two'>
        {!! Form::select('company[status]', ['0' => 'Desactivado', '1'=>"Activado"], isset($company) ? $company->status :old('company.status'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Estado',
        ]) !!}
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        Dirección:
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('company[address]', isset($company) ? $company->address :old('company.address'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Jose Luis Lagrange #23, Polanco Sec 1, Miguel Hidalgo CDMX',
            'rows' => '2'
        ]) !!}
    </x-slot>
</x-row-two>

<x-row-three>
    <x-slot name='label'>
        Coordenadas:
    </x-slot>
    <x-slot name='one'>
        {!! Form::text('company[lat]', isset($company) ? $company->lat : old('company.lat'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Latitud',
        ]) !!}
    </x-slot>
    <x-slot name='two'>
        {!! Form::text('company[lon]', isset($company) ? $company->lon : old('company.lon'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Longitud',
        ]) !!}
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        Descripción:
    </x-slot>
    <x-slot name='input'>
        {!! Form::textarea('company[description]', isset($company) ? $company->description : old('company.description'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta quae rem ipsum quibusdam modi. Eos consectetur, cum voluptate illo ea repellat nesciunt placeat magnam? Ab cum dolore porro error esse?',
            'rows' => 3
            
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
