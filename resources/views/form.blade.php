<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ url((isset($medico) ? $medico->id : '') ) }}">

    @if(isset($medico))
        @method('PUT')
    @endif

    @csrf

        <label for="nome">Nome:</label>
        <input value="{{old('nome', isset($medico) ? $medico->nome : '')}}" type="text" id="nome" name="nome">
        {{$errors->first('nome')}}
        <br><br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input value="{{old('data_nascimento', isset($medico) ? $medico->data_nascimento : '')}}" type="text" id="data_nascimento" name="data_nascimento">
        {{$errors->first('data_nascimento')}}
        <br><br>
        
        <label for="crm">C.R.M.</label>
        <input value="{{old('crm', isset($medico) ? $medico->crm : '')}}" type="text" id="crm" name="crm">
        {{$errors->first('crm')}}
        <br><br>
       
        <label for="area_id">Area</label>
        <select name="area_id">
            @foreach($areas as $area)
                <option {{isset($medico) && $medico->area_id == $area->id ? 'selected' : ''}} value="{{$area->id}}">{{$area->area}}</option>
            @endforeach
        </select>
        {{$errors->first('area_id')}}
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>