<div style="margin: 0px 50px 100px 50px">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>№ п/п</th>
            <th>Ім'я</th>
            <th>Іконка</th>
            <th>Teкст</th>
            <th>Дата створення</th>
            <th>Видалити</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{$service->id}}</td>
            <td>{{ Html::link(route('servicesEdit', ['service'=>$service->id]), $service->name, ['alt'=>$service->name]) }}</td>
            <td>{{$service->icon}}</td>
            <td>{{$service->text}}</td>
            <td>{{$service->created_at}}</td>
            <td>
                {!! Form::open(['url'=>route('servicesEdit', ['services'=>$service->id]), 'class'=>'form-horisontal', 'method'=>'DELETE']) !!}
                {{ method_field('DELETE') }}
                {!! Form::button('Видалити', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {!! Html::link(route('servicesAdd'), 'Додати новий сервіс') !!}

</div>