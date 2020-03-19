<div class="table-responsive">
    <table id="school-table" class="table table-hover">
        <thead>
            <tr class="table-secondary table-style">
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo do usuário</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->level == 1)
                            <span class="btn btn-sm btn-badge">Administrador</span>
                        @elseif($user->level == 2)
                            <span class="btn btn-sm btn-badge">Escola</span>
                        @elseif($user->level == 3)
                            <span class="btn btn-sm btn-badge">Professor</span>
                        @elseif($user->level == 4)
                            <span class="btn btn-sm btn-badge">Comum</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{url('user', [$user->id])}}" class="input-group" method="POST">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-{{$user->trashed() ? 'success' : 'danger'}} btn-sm">
                                    <i class="{{$user->trashed() ? 'fas fa-undo-alt' : 'fas fa-trash-alt'}}"></i> {{$user->trashed() ? 'Liberar' : 'Suspender'}}
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
                    Página {{$users->currentPage()}} de {{$users->lastPage()}}
                    - Exibindo {{$users->perPage()}} registro(s) por página de {{$users->total()}}
                    registro(s) no total
                </p>
                </td>     
            </tr>
            @if($users->lastPage() > 1)
            <tr>
                <td colspan="100%">
                {{ $users->links() }}
                </td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>