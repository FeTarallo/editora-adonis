<div class="table-responsive">
    <table id="school-table" class="table table-hover">
        <thead>
            <tr class="table-secondary table-style">
                <th width="600px">Nome</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{$school->name}}</td>

                    @if($status == "ativos")
                    <td class="min">         
                        <a class="btn btn-secondary btn-sm" href='{{ url("school/$school->id/edit") }}'><i class="fas fa-edit"></i> Editar</a>
                    </td>
                    <td class="min">
                        <a class="btn btn-info btn-sm" href='{{ url("school/$school->id") }}'><i class="fas fa-search"></i> Ver</a>
                    </td>
                    @endif
                    <td>
                        <form action="{{url('school', [$school->id])}}" class="input-group" method="POST">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-{{$school->trashed() ? 'success' : 'danger'}} btn-sm">
                                    <i class="{{$school->trashed() ? 'fas fa-undo-alt' : 'fas fa-trash-alt'}}"></i> {{$school->trashed() ? 'Restaurar' : 'Deletar'}}
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
                    Página {{$schools->currentPage()}} de {{$schools->lastPage()}}
                    - Exibindo {{$schools->perPage()}} registro(s) por página de {{$schools->total()}}
                    registro(s) no total
                </p>
                </td>     
            </tr>
            @if($schools->lastPage() > 1)
            <tr>
                <td colspan="100%">
                {{ $schools->links() }}
                </td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>