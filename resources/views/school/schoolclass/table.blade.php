<div class="table-responsive">
    <table id="school-table" class="table table-hover">
        <thead>
            <tr class="table-secondary table-style">
                <th width="">Curso</th>
                <th width="">Série</th>
                <th>Ano</th>
                <th>Professor(a)</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schoolclasses as $schoolclass)
                <tr>
                    <td>{{$schoolclass->course}}</td>
                    <td>{{$schoolclass->serie}}</td>
                    <td>{{$schoolclass->year}}</td>
                    <td>{{$schoolclass->teacher}}</td>
                    @if($status == "ativos")
                    <td class="min">         
                        <a class="btn btn-secondary btn-sm" href=''><i class="fas fa-edit"></i> Editar</a>
                    </td>
                    <td class="min">
                        <a class="btn btn-info btn-sm" href='{{ url("schoolclass/$schoolclass->id") }}'><i class="fas fa-search"></i> Ver</a>
                    </td>
                    @endif
                    <td>
                        <form action="{{url('schoolclass', [$schoolclass->id])}}" class="input-group" method="POST">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-{{$schoolclass->trashed() ? 'success' : 'danger'}} btn-sm">
                                    <i class="{{$schoolclass->trashed() ? 'fas fa-undo-alt' : 'fas fa-trash-alt'}}"></i> {{$schoolclass->trashed() ? 'Restaurar' : 'Deletar'}}
                                </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="100%" class="text-center">
                <p class="text-center">
                    Página {{$schoolclasses->currentPage()}} de {{$schoolclasses->lastPage()}}
                    - Exibindo {{$schoolclasses->perPage()}} registro(s) por página de {{$schoolclasses->total()}}
                    registro(s) no total
                </p>
                </td>     
            </tr>
            @if($schoolclasses->lastPage() > 1)
            <tr>
                <td colspan="100%">
                {{ $schoolclasses->links() }}
                </td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>