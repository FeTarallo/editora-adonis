@extends('../layouts.app')   
@section('title')
   {{$data['title']}}
@endsection
@section('content')
<section class="get-in-touch">
   <form id="form-professor" method="POST" action="{{url($data['url'])}}" class="contact-form row" enctype="multipart/form-data">
   @csrf

      @if($data['model'])
         @method('PUT')
      @endif

      <h3 class="sub-title col-lg-12"><i class="fas fa-users form-icon"></i> Dados básicos</h3>

      <div class="form-field col-lg-12">
         <input id="name" name="teacher[name]" class="input-text js-input" type="text" value="{{ old('teacher.name', $data['model'] ? $data['model']->name : '') }}">
         <label class="label" for="serie">Nome</label>
         <small id="error" class="errors font-text text-danger">{{ $errors->first('teacher.name') }}</small>
      </div>

      <div class="form-field col-lg-12">
         <input id="name" name="teacher[email]" class="input-text js-input" type="text" value="{{ old('teacher.email', $data['model'] ? $data['model']->email : '') }}">
         <label class="label" for="serie">Email</label>
         <small id="error" class="errors font-text text-danger">{{ $errors->first('teacher.email') }}</small>
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
<script src="../../public/js/teacher/form.js"></script>
@endsection