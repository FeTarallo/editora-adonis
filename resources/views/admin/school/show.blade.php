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
         <td><b>Nome da Escola: </b>{{$data["school"]->name}}</td>
         <td><b>Diretor: </b>{{$data["school"]->principal}}</td>
      </tr>
      <tr>
         <td><b>Email: </b>{{$data["school"]->email}}</td>
         <td><b>Telefone: </b>{{$data["school"]->telephone}}</td>
      </tr>
      <tr>
         <td colspan="2"><b>Data de cadastro: </b>{{date('d/m/Y', strtotime($data["school"]->created_at))}}</td>
      </tr>
   </tbody>
</table>
<table class="table table-striped">
   <thead>
      <tr>
         <th colspan=3 scope="row" class="show-title">Endereço</th>
      </tr>
   </thead>
   <tbody>
      @foreach($data['address'] as $address)
      <tr>
         <td><b>Rua: </b>{{$address->street}}</td>
         <td><b>Número: </b>{{$address->number}}</td>
         <td><b>Bairro: </b>{{$address->district}}</td>
      </tr>
      <tr>
         <td><b>CEP: </b>{{$address->cep}}</td>
         <td><b>Estado: </b>Qualquer</td>
         <td><b>Cidade: </b> {{$address->city}}</td>
      </tr>
      <tr>
         <td colspan=3><b>Complemento: </b>{{$address->complement}}</td>
      </tr>
      @endforeach
   </tbody>
</table>

@endsection