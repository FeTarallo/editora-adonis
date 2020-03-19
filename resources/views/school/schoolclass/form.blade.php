@extends('../layouts.app')   
@section('title')
   {{$data['title']}}
@endsection
@section('content')
<section class="get-in-touch">
   <form id="form-turma" method="POST" action="{{url($data['url'])}}" class="contact-form row" enctype="multipart/form-data">
   @csrf

      @if($data['model'])
         @method('PUT')
      @endif

      <h3 class="sub-title col-lg-12"><i class="fas fa-users form-icon"></i> Dados básicos</h3>

      <div class="form-field col-lg-4">
         <select id="period" name="schoolclass[period]" class="input-text period">
            <option>Selecione</option>
            @foreach($data['period'] as $period))
               <option value="{{ $period->id }}">{{ $period->name }}</option>
            @endforeach
         </select>
         <label class="label" for="period">Período</label>
      </div>
      <div class="form-field col-lg-8">
         <select id="course" name="schoolclass[course]" class="input-text state">
            <option>Selecione</option>
            option>Selecione</option>
            @foreach($data['course'] as $course))
               <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
         </select>
         <label class="label" for="course">Curso</label>
      </div>

      <div class="form-field col-lg-2">
         <input id="serie" name="schoolclass[serie]" class="input-text js-input" type="text" value="{{ old('schoolclass.serie', $data['model'] ? $data['model']->serie : '') }}">
         <label class="label" for="serie">Série</label>
         <small id="error" class="errors font-text text-danger">{{ $errors->first('schoolclass.serie') }}</small>
      </div>

      <div class="form-field col-lg-2">
         <input id="year" name="schoolclass[year]" class="input-text js-input" type="text" value="{{ old('schoolclass.year', $data['model'] ? $data['model']->year : '') }}">
         <label class="label" for="year">Ano letivo</label>
         <small id="error" class="errors font-text text-danger">{{ $errors->first('schoolclass.year') }}</small>
      </div>

      <div class="form-field col-lg-8">
         <input id="teacher" name="schoolclass[teacher]" class="input-text js-input" type="text" value="{{ old('schoolclass.teacher', $data['model'] ? $data['model']->teacher : '') }}">
         <label class="label" for="teacher">Professor</label>
         <small id="error" class="errors font-text text-danger">{{ $errors->first('schoolclass.teacher') }}</small>
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
<script src="../../public/js/schoolclass/form.js"></script>
@endsection