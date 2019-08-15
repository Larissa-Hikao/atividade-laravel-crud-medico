<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<h2>Médicos</h2>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>C.R.M.</th>
            <th>Area</th>
            <th colspan="2">Ações</th>
        </tr>
        @foreach($medicos as $medico)
            <tr>
                <td>{{$medico->nome}}</td>
                <td>{{$medico->data_nascimento}}</td>
                <td>{{$medico->crm}}</td>
                <td>{{$medico->area->area}}</td>
                <td><a href="{{url($medico->id.'/edit')}}"><button>Editar</button></a></td>
                <td>
                    <form method="POST" action="{{url($medico->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br><br><br>

    <h2>Médicos inativos</h2>
    <table border=1>
        <tr>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>C.R.M.</th>
        <th>Area</th>
        <th>Ações</th>
        </tr>
        @foreach($medicosInativos as $medico)
            <tr>
                <td>{{$medico->nome}}</td>
                <td>{{$medico->data_nascimento}}</td>
                <td>{{$medico->crm}}</td>
                <td>{{$medico->area->area}}</td>
                <td>
                    <form method="POST" action="{{url('restore/'.$medico->id)}}">
                        @method('put')
                        @csrf
                        <button type="submit">Restaurar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>