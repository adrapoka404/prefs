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
        {!! Form::text('blog[title]', isset($blog) ? $blog->title :old('blog.title'), [
            'class'         => 'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder'   => 'Mejores practicas en el trabajo'
        ]) !!}
    </x-slot>
</x-row-two>
<x-row-two>
    <x-slot name='label'>
        Contenido
    </x-slot>
    <x-slot name='input'>
        {!! Form::textarea('blog[body]', isset($blog) ? $blog->body :old('blog.body'), [
            'class'         => 'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder'   => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde iure nesciunt tempora, incidunt similique accusantium consequuntur error, laboriosam velit pariatur alias! Quia aliquid, asperiores placeat quis facilis earum culpa natus?',
            'id'            => 'body'
        ]) !!}
    </x-slot>
</x-row-two>
<x-row-two>
    <x-slot name='label'>
        Estado
    </x-slot>
    <x-slot name='input'>
        {!! Form::select('blog[status]', ['0' => 'Desactivado', '1'=>"Activado"], isset($blog) ? $blog->status :old('blog.status'), [
            'class' =>
                'border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full text-gray-500',
            'placeholder' => 'Estado',
        ]) !!}
    </x-slot>
</x-row-two>

@section('jquery')
    <script>
        CKEDITOR.replace('body');
        $(document).ready(function() {
            
            console.log('adx in form');
            $("#btnSave").on("click", function() {
                $("#formCreate").submit();
            })
        })
    </script>
@endsection
