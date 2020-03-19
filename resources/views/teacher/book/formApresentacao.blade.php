@extends('../layouts.app')   
@section('title')
   {{$data['title']}}
@endsection
@section('content')
<section class="get-in-touch">
   <form id="form-page" method="POST" action="{{url($data['url'])}}" class="contact-form row" enctype="multipart/form-data">
   @csrf
      @if($data['model'])
         @method('PUT')
      @endif
      <h3 class="sub-title col-lg-12"><i class="fas fa-book"></i> Dados básicos</h3>
      <div class="form-field col-lg-12">
         <input id="name" name="book[name]" class="input-text js-input" type="text" value="{{ old('book.name', $data['model'] ? $data['model']->name : '') }}">
         <label class="label" for="name">Nome do Livro</label>
         <small id="error" class="errors font-text text-danger">{{ $errors->first('book.name') }}</small>
      </div>
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

@foreach($book->pages()->get() as $page)
         <div id="container">
            <div class="page-image">
               <img class="img-fluid" src="{{asset('/storage/images/'.$page->image)}}" style="height:300px; width:700px;">
            </div>
            <div class="page-text">
               {{$page->text}}
            </div>
         </div>
      @endforeach