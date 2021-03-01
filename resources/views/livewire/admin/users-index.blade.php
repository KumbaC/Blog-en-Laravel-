<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="my-1 form-control col-sm-3" placeholder="Buscar">
    </div>

    @if($users->count())

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th colspan="2"></th>

                    </tr>
                </thead>
              <tbody>
                  @foreach($users as $user)
                   <tr>
                     <td>{{$user->id}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td width="15px"><a class="btn btn-primary" href="{{route("admin.users.edit", $user)}}"><i class="fas fa-edit"></i></td></a>
                   </tr>
                @endforeach
               </tbody>
            </table>
            <div class="card-footer">
                {{$users->links()}}
            </div>
            @else
            <div class="card-body">
                <center><strong>No se encuentran resultados de su busqueda</strong></center>
            </div>
            @endif
        </div>
    </div>
</div>
