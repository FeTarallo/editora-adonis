@extends('../layouts.app')   
@section('title')
   <!-- <i class="btn-lg btn-light text-center float-left fas fa-arrow-left"></i> -->
   {{$data['title']}}
@endsection
@section('content')
<table class="table table-striped">
   <thead>
      <tr>
         <th colspan=2 scope="row" class="show-title">Dados Gerais</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td><b>Curso: </b>{{$data['schoolclass']->course}}</td>
         <td><b>Série: </b>{{$data['schoolclass']->serie}}</td>
      </tr>
      <tr>
         <td><b>Período: </b>{{$data['schoolclass']->period}}</td>
         <td><b>Ano: </b>{{$data['schoolclass']->year}}</td>
      </tr>
      <tr>
         <td colspan="2"><b>Professor: </b>{{$data['schoolclass']->teacher}}</td>
      </tr>
   </tbody>
</table>
@endsection