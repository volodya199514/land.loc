<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('servicesEdit', array('service'=>$services->id)), 'class'=>'form-horizontal', 'method'=>'post', 'enctype'=>'multipart/form-data' ]) !!}
   <div class="form-group">
       {!! Form::hidden('id', $services->id) !!}
       {!! Form::label('name', 'Назва', ['class'=>'col-xs-2 control-label']) !!}
       <div class="col-xs-8">
           {!! Form::text('name', $services->name, ['class'=>'form-control', 'placeholder'=>'Введіть назву портфоліо']) !!}
       </div>
   </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $services->text, ['id'=>'editor','class'=>'form-control', 'placeholder'=>'Введіть назву портфоліо']) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('icon', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon', $services->icon, ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Зберегти', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>

<script>
    CKEDITOR.replace('editor');
</script>


