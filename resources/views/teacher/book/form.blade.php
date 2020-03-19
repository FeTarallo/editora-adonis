@extends('../layouts.app')   
@section('title')
   {{$data['title']}}
@endsection
@section('content')
<section class="get-in-touch">
   <form id="form-page" method="POST" action="{{url($data['url'])}}" class="contact-form" enctype="multipart/form-data">
   @csrf
      @if($data['model'])
         @method('PUT')
      @endif
      <div class="accordion" id="accordionExample">
         <div class="card">
            <div class="card-header" id="headingOne">
               <h2 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Cadastro Básico
               </button>
               </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
               <div class="card-body">
                  <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Dados Básicos: </h3>
                  <div class="row-ficha">
                     <div class="col-lg-12">
                        <div class="form-field">
                           <input id="book-name" name="book[name]" class="input-text js-input" type="text" value="">
                           <label class="label" for="name">Nome do livro</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                  </div>
               </div>                
            </div>
         </div>
         <div class="card">
            <div class="card-header" id="headingTwo">
               <h2 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Cadastre a Capa do seu Livro
               </button>
               </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
               <div class="card-body">
               <div class="col-lg-3 imgUp">
                  <div class="imagePreview"></div>
                     <label class="btn btn-secondary">Upload
      			         <input type="file" id="image" class="uploadFile img" name="book[cover]" value="" style="width: 0px;height: 0px;overflow: hidden;">
      		         </label>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header" id="headingThree">
               <h2 class="mb-0">
               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Ficha Catalográfica
               </button>
               </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
               <div class="card-body">
                  <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Quem escreveu: </h3>
                  <div class="row-ficha">
                     <div class="col-lg-6">
                        <div class="form-field">
                           <input id="ficha-escritor-name" name="ficha[writer_name]" class="input-text js-input" type="text" value="">
                           <label class="label" for="name">Nome</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-field">
                           <input id="ficha-escritor-lastname" name="ficha[writer_lastname]" class="input-text js-input" type="text" value="">
                           <label class="label" for="lastname">Sobrenome</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                  </div>
                  <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Quem ilustrou: </h3>
                  <div class="row-ficha">
                     <div class="col-lg-6">
                        <div class="form-field">
                           <input id="ficha-ilustrador-name" name="ficha[illustrator_name]" class="input-text js-input" type="text" value="">
                           <label class="label" for="name">Nome</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-field">
                           <input id="ficha-ilustrador-lastname" name="ficha[illustrator_lastname]" class="input-text js-input" type="text" value="">
                           <label class="label" for="lastname">Sobrenome</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                  </div>
                  <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Quem revisou: </h3>
                  <div class="row-ficha">
                     <div class="col-lg-6">
                        <div class="form-field">
                           <input id="ficha-revisor-name" name="ficha[reviewer_name]" class="input-text js-input" type="text" value="">
                           <label class="label" for="name">Nome</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-field">
                           <input id="ficha-revisor-lastname" name="ficha[reviewer_lastname]" class="input-text js-input" type="text" value="">
                           <label class="label" for="lastname">Sobrenome</label>
                           <small id="error" class="errors font-text text-danger"></small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header" id="headingFour">
               <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                     Páginas
                  </button>
               </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
               <div class="card-body">
               <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Páginas</h3>
               @foreach(old('pages', $data['pages']) as $key => $page)
               <div id="pages">
                  <div class="row page">
                     <div class="col-lg-3 imgUp">
                        <div class="imagePreview"></div>
                        <label class="btn btn-secondary">Upload
               			   <input type="file" id="image" class="uploadFile img" name="page[{{$key}}][image]" value="" style="width: 0px;height: 0px;overflow: hidden;">
               		   </label>
                     </div>
                     <div class="addDel">
                        <i class="fa fa-plus pageAdd"></i>
                        <i class="fa fa-trash-alt pageDel"></i>
                     </div>
                     <div class="col-lg-8">
                        <textarea class="form-control" id="ckeditor" name="page[{{$key}}][text]" required></textarea>
                     </div>
                  </div>
               </div>
               @endforeach
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header" id="headingFive">
               <h2 class="mb-0">
               <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Página de Apresentação
               </button>
               </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
               <div class="card-body">
                  <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Quem escreveu?</h3>
                  <div id="apresentacao">
                     <div class="row apresentacao">
                        <div class="col-lg-3 imgUp">
                           <div class="imagePreview"></div>
                           <label class="btn btn-secondary">Upload
      			               <input type="file" id="image" class="uploadFile img" name="introduction[writer_image]" value="" style="width: 0px;height: 0px;overflow: hidden;">
      		               </label>
                        </div>
                        <div class="col-lg-8">
                           <div class="form-field">
                              <input id="name" name="introduction[writer_name]" class="input-text js-input" type="text">
                              <label class="label" for="name">Nome Completo</label>
                              <small id="error" class="errors font-text text-danger"></small>
                           </div>
                           <textarea class="form-control" id="escritor" name="introduction[writer_about]" rows="4"></textarea>
                        </div>
                     </div>
                  </div>
                  <h3 class="sub-title col-lg-12"><i class="fas fa-bookmark"></i> Quem ilustrou?</h3>
                  <div id="apresentacao">
                     <div class="row apresentacao">
                        <div class="col-lg-3 imgUp">
                           <div class="imagePreview"></div>
                           <label class="btn btn-secondary">Upload
                  			   <input type="file" id="image" class="uploadFile img" name="introduction[illustrator_image]" value="" style="width: 0px;height: 0px;overflow: hidden;">
                  		   </label>
                        </div>
                        <div class="col-lg-8">
                           <div class="form-field">
                              <input id="name" name="introduction[illustrator_name]" class="input-text js-input" type="text" value="">
                              <label class="label" for="name">Nome Completo</label>
                              <small id="error" class="errors font-text text-danger"></small>
                           </div>
                           <textarea class="form-control" id="ilustrador" name="introduction[illustrator_about]" rows="4"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header" id="headingSix">
               <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                     Sinopse
                  </button>
               </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
               <div class="card-body">
                  <div class="col-lg-12">
                     <textarea class="form-control" id="ilustrador" name="book[sinopse]" rows="4" placeholder="Escreva aqui a sinopse do seu livro"></textarea>
                  </div>
               </div>
            </div>
         </div>
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
<script src="../../public/js/book/form.js"></script>
@endsection