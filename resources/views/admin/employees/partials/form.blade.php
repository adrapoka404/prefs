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
        Tu nombre:
    </x-slot>
    <x-slot name='one'>
        {!! Form::text('employee[name]', isset($employee) ? $employee->name : old('employee.name'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Nombre(s)',
        ]) !!}
    </x-slot>
    <x-slot name='two'>
        {!! Form::text('employee[surname]', isset($employee) ? $employee->surname : old('employee.surname'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Apellido',
        ]) !!}
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        Correo eléctronico:
    </x-slot>
    <x-slot name='input'>
        {!! Form::email('employee[mail]', isset($employee) ? $employee->mail : old('employee.mail'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'tu@dominio.com',
        ]) !!}
    </x-slot>
</x-row-two>

<x-row-three>
    <x-slot name='label'>
        Empresa:
    </x-slot>
    <x-slot name='one'>
        <select name="employee[company]" id=""
            class='border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500'>
            <option>Empresa</option>
            @foreach ($companies as $company)
                @if ($company->id == (old('employee.company') ? old('employee.company') : (isset($employee) ? $employee->company :'')))
                    <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                @else
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endif
            @endforeach
        </select>
    </x-slot>
    <x-slot name='two'>
        <select name="employee[position]" id=""
            class='border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500'>
            <option>Puesto</option>
            @foreach ($positions as $position)
                @if ($position->id == (old('employee.position') ? old('employee.position') : (isset($employee) ? $employee->position :'')))
                    <option value="{{ $position->id }}" selected>{{ $position->name }}</option>
                @else
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endif
            @endforeach
        </select>
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        Teléfono:
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('employee[mobile]', isset($employee) ? $employee->mobile : old('employee.mobile'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Teléfono',
        ]) !!}
    </x-slot>
</x-row-two>
<x-row-three>
    <x-slot name='label'>
        Fecha de nacimiento / Fecha de matrimonio:
    </x-slot>
    <x-slot name='one'>
        {!! Form::date('employee[birthday]', isset($employee) ? $employee->birthday : old('employee.birthday'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Nacimiento',
        ]) !!}
    </x-slot>
    <x-slot name='two'>
        {!! Form::date('employee[daydeath]', isset($employee) ? $employee->daydeath : old('employee.daydeath'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Matrimonio',
        ]) !!}
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        NSS:
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('employee[nss]', isset($employee) ? $employee->nss : old('employee.nss'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Número de seguro social',
        ]) !!}
    </x-slot>
</x-row-two>

<x-row-three>
    <x-slot name='label'>
        Dirección:
    </x-slot>
    <x-slot name='one'>
        {!! Form::text('employee[zip]', isset($employee) ? $employee->zip : old('employee.zip'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'C.P.',
            'id' => 'zip',
        ]) !!}
    </x-slot>
    <x-slot name='two'>
        {!! Form::text('employee[colony]', isset($employee) ? $employee->colony : old('employee.colony'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Colonia/Alcaldia',
            'id' => 'colonyTxt',
        ]) !!}
        {!! Form::select('employee[colony]', [], isset($employee) ? $employee->colony : old('employee.colony'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500 hidden',
            'placeholder' => 'Colonia/Alcaldia',
            'id' => 'colonySelect',
        ]) !!}
        <small class=" text-xs font-bold text-red-600 hidden" id='searching'>Estamos buscando...</small>
    </x-slot>
</x-row-three>

<x-row-two>
    <x-slot name='label'>
        Calle:
    </x-slot>
    <x-slot name='input'>
        {!! Form::text('employee[address]', isset($employee) ? $employee->address : old('employee.address'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Calle Emilio Carranza #1234',
        ]) !!}
    </x-slot>
</x-row-two>
@section('jquery')
    <script>
        var colonyOld = "{{ isset($employee) ? $employee->colony : old('employee.colony') }}";
        console.log(colonyOld);
        $(document).ready(function() {
            console.log('Hello mother foka!');

            $("#btnSave").on("click", function() {
                $("#formCreate").submit();
            })

            if ($("#zip").val() != '')
                getColonies($("#zip").val());

            $("#zip").on('keyup', function() {
                var zip = $(this).val();
                if (zip.length > 3)
                    getColonies(zip)
            })

            function getColonies(zip) {
                searchingZip()
                $.ajax("{{ route('services.zipcode', '') }}/" + zip, )
                    .done(function(zips) {
                        if (zips) {
                            select = "<option>Selecciona colonia</option>";
                            $.each(zips, function(i, v) {
                                if (v.asentamiento == colonyOld)
                                    select += "<option value='" + v.asentamiento + "' selected> " + v
                                    .asentamiento + "</option>";
                                else
                                    select += "<option value='" + v.asentamiento + "'> " + v
                                    .asentamiento + "</option>";
                            })
                            $("#colonySelect").html(select);
                            showZipSelect()
                        } else {
                            $("#zipTxt").attr('placeholder', 'Ingresa colonia de forma manual');
                            showZipTxt()
                        }
                    })
                    .fail(function() {
                        console.log("error");
                        alert("Error de conexión: Verifique");
                    });
            }

            function showZipSelect() {
                $("#colonyTxt").hide()
                $("#searching").hide()
                $("#colonySelect").show()
            }

            function showZipTxt() {
                $("#colonySelect").hide()
                $("#searching").hide()
                $("#colonyTxt").show()
            }

            function searchingZip() {
                $("#colonyTxt").hide()
                $("#colonySelect").hide()
                $("#searching").show()
            }
        })
    </script>
@endsection
