<div style="margin: 0px 50px 100px 50px">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>№ п/п</th>
            <th>Ім'я</th>
            <th>Картинка</th>
            <th>Фільтр</th>
            <th>Дата створення</th>
            <th>Видалити</th>
        </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $portfolio)
            <tr>
                <td>{{$portfolio->id}}</td>
                <td>{{ Html::link(route('portfolioEdit', ['portfolio'=>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name]) }}</td>
                <td>{{$portfolio->images}}</td>
                <td>{{$portfolio->filter}}</td>
                <td>{{$portfolio->created_at}}</td>
                <td>
                    {!! Form::open(['url'=>route('portfolioEdit', ['portfolio'=>$portfolio->id]), 'class'=>'form-horisontal', 'method'=>'DELETE']) !!}
                    {{ method_field('DELETE') }}
                    {!! Form::button('Видалити', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! Html::link(route('portfolioAdd'), 'Додати нове портфоліо') !!}

</div>



