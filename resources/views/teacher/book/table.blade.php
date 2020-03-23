<div class="table-responsive">
    <table id="school-table" class="table table-hover">
        <thead>
            <tr class="table-secondary table-style">
                <th width="">Título</th>
                <th width="">Turma</th>
                <th colspan="1">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->school_class_id}}</td>
                    @if($status == "ativos")
                    <td class="min">
                        <a class="btn btn-info btn-sm" href='{{ url("book/$book->id") }}'><i class="fas fa-download"></i> Download</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="100%" class="text-center">
                <p class="text-center">
                    Página {{$books->currentPage()}} de {{$books->lastPage()}}
                    - Exibindo {{$books->perPage()}} registro(s) por página de {{$books->total()}}
                    registro(s) no total
                </p>
                </td>     
            </tr>
            @if($books->lastPage() > 1)
            <tr>
                <td colspan="100%">
                {{ $books->links() }}
                </td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>