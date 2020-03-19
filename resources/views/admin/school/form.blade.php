@extends('../layouts.app')   
@section('title')
   {{$data['title']}}
@endsection
@section('content')
<section class="get-in-touch">
   <form id="form-escola" method="POST" action="{{url($data['url'])}}" class="contact-form row">
   @csrf
      @if($data['model'])
         @method('PUT')
      @endif
      <h3 class="sub-title col-lg-12"><i class="fas fa-user form-icon"></i> Dados básicos</h3>
      <div class="form-field col-lg-12">
         <input id="name" name="school[name]" class="input-text js-input" type="text" value="{{ old('school.name', $data['model'] ? $data['model']->name : '') }}" required>
         <label class="label" for="name">Nome da escola</label>
      </div>
      <div class="form-field col-lg-12">
         <input id="principal" name="school[principal]" class="input-text js-input" type="text" value="{{ old('school.principal', $data['model'] ? $data['model']->principal : '') }}" required>
         <label class="label" for="principal">Nome do responsável</label>
       </div>
       <h3 class="sub-title col-lg-12"><i class="fas fa-phone"></i> Contato</h3>
       <div class="form-field col-lg-6">
           <input id="email" name="school[email]" class="input-text js-input" type="email" value="{{ old('school.email', $data['model'] ? $data['model']->email : '') }}" required>
           <label class="label" for="email">Email</label>
       </div>
       <div class="form-field col-lg-3">
           <input type="text" name="school[telephone]" class="input-text phone" id="telephone" value="{{ old('school.telephone', $data['model'] ? $data['model']->telephone : '') }}">
           <label class="label" for="telephone">Telefone</label>
       </div>
       <div class="form-field col-lg-3">
           <input id="cell-phone" name="cell-phone" class="input-text cell-phone" type="text">
           <label class="label" for="cell-phone">Celular</label>
       </div>
       <h3 class="sub-title col-lg-12"><i class="fas fa-map-marker-alt"></i> Endereço</h3>
       <div class="form-field col-lg-6">
           <input id="cep" name="address[cep]" type="text" class="input-text cep" value="{{ old('address.cep', $data['model'] ? $data['model']->address()->first()->cep : '') }}">
           <label class="label" for="cep">CEP</label>
       </div>
       <div class="form-field col-lg-6">
           <select id="state" name="address[state]" class="input-text state">
               <option>Selecione</option>
               @foreach($data['state'] as $state))
                   <option data-uf="{{$state->uf}}" value="{{ $state->id }}">{{ $state->name }}</option>
               @endforeach
           </select>
           <label class="label" for="state">Estado</label>
       </div>
       <div class="form-field col-lg-6">
           <input id="city" name="address[city]" class="input-text js-input" type="text" value="{{ old('address.city', $data['model'] ? $data['model']->address()->first()->city : '') }}"required>
           <label class="label" for="city">Cidade</label>
       </div>
       <div class="form-field col-lg-6">
           <input id="street" name="address[street]" class="input-text js-input" type="text" value="{{ old('address.street', $data['model'] ? $data['model']->address()->first()->street : '') }}"required>
           <label class="label" for="street">Rua</label>
       </div>
       <div class="form-field col-lg-3">
           <input id="number" name="address[number]" class="input-text" type="text" value="{{ old('address.number', $data['model'] ? $data['model']->address()->first()->number : '') }}" required>
           <label class="label" for="number">Número</label>
       </div>
       <div class="form-field col-lg-3">
           <input id="district" name="address[district]" class="input-text js-input" type="text" value="{{ old('address.district', $data['model'] ? $data['model']->address()->first()->district : '') }}" required>
           <label class="label" for="district">Bairro</label>
       </div>
       <div class="form-field col-lg-6">
           <input id="complement" name="address[complement]" class="input-text js-input" type="text"value="{{ old('address.complement', $data['model'] ? $data['model']->address()->first()->complement : '') }}" required>
           <label class="label" for="complement">Complemento</label>
       </div>
   </form>
</section>
@endsection
@section('footer')
<div class="form-field col-lg-12">
    <input class="btn btn-success float-right sendForm" type="submit" value="{{$data['button']}}">
</div>
@endsection
@section('script')
<script src="../../public/js/school/form.js"></script>
<script>
$(".sendForm").on('click',function(){
    if($("#form-escola").valid()){
        $(".sendForm").prop("disabled",true) 
        $("#form-escola").submit()  
    }
});
</script>
@endsection