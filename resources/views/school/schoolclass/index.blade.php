@extends('../layouts.app')
@section('style')
<link type="text/css" rel="stylesheet" href="../public/css/style.css">  
@endsection
@section('title')
   {{$data['title']}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form id="form">
                <div class="form-group">
                    <div class="input-group">
                        <input id="search-input" class="form-control" type="text" name="pesquisa" />
                        <i id="search-button" class="btn fa fa-search ml-2 search" aria-hidden="true"></i>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="text-right">
                <a class="btn btn-style" href="{{url('/schoolclass/create')}}">
                    <i class="fas fa-plus-circle add-circle"></i>Cadastrar Turma
                </a>
            </div>
        </div>
    </div>
    
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="ativos-tab" data-toggle="tab" href="#ativos" role="tab" aria-controls="ativos" aria-selected="true">Cadastros ativos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="inativos-tab" data-toggle="tab" href="#inativos" role="tab" aria-controls="inativos" aria-selected="false">Cadastros inativos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="ativos" role="tabpanel"></div>
        <div class="tab-pane fade" id="inativos" role="tabpanel"></div>
    </div>
    
@endsection
@section('script')
<script src="../public/js/schoolclass/index.js"></script>
@endsection