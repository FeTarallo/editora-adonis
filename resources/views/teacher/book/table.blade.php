<div class="table-responsive">
    <table id="school-table" class="table table-hover">
        <thead>
            <tr class="table-secondary table-style">
                <th width="">ID</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    @if($status == "ativos")
                    <td class="min">
                        <a class="btn btn-info btn-sm" href='{{ url("book/$book->id") }}'><i class="fas fa-search"></i> Ver</a>
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