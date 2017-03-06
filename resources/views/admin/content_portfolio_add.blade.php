<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('portfolioAdd'), 'class'=>'form-horizontal', 'metod'=>'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Назва', ['class'=>'col-xs-2 control-label' ]) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Введіть назву сторінки']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('filter', 'Категорія:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('filter', old('filter'), ['class' => 'form-control','placeholder'=>'Введіть категорію']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
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