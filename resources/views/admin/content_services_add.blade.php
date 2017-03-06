<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('servicesAdd'), 'class'=>'form-horizontal', 'metod'=>'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Назва', ['class'=>'col-xs-2 control-label' ]) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Введіть назву сервісу']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('filter'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введіть категорію']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon', old('icon'), ['class' => 'form-control','placeholder'=>'Введите псевдоним іконки']) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close();  !!}

    <script>
        CKEDITOR.replace('editor');
    </script>
</div>