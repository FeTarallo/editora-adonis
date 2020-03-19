<div class="table-responsive">
    <table id="school-table" class="table table-hover">
        <thead>
            <tr class="table-secondary table-style">
                <th width="">Nome</th>
                <th width="">Email</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->email}}</td>
                    @if($status == "ativos")
                    <td class="min">         
                        <a class="btn btn-secondary btn-sm" href='{{ url("teacher/$teacher->id/edit") }}'><i class="fas fa-edit"></i> Editar</a>
                    </td>
                    <td class="min">
                        <a class="btn btn-info btn-sm" href='{{ url("teacher/$teacher->id") }}'><i class="fas fa-search"></i> Ver</a>
                    </td>
                    @endif
                    <td>
                        <form action="{{url('teacher', [$teacher->id])}}" class="input-group" method="POST">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-{{$teacher->trashed() ? 'success' : 'danger'}} btn-sm">
                                    <i class="{{$teacher->trashed() ? 'fas fa-undo-alt' : 'fas fa-trash-alt'}}"></i> {{$teacher->trashed() ? 'Restaurar' : 'Deletar'}}
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
                    Página {{$teachers->currentPage()}} de {{$teachers->lastPage()}}
                    - Exibindo {{$teachers->perPage()}} registro(s) por página de {{$teachers->total()}}
                    registro(s) no total
                </p>
                </td>     
            </tr>
            @if($teachers->lastPage() > 1)
            <tr>
                <td colspan="100%">
                {{ $teachers->links() }}
                </td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>