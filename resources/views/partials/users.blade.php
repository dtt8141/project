
<h2 class="text-center" >Users List</h2>
<hr/><table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $users as $user )
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
              <td style="min-width:100px;">                        
                @if(Auth::user()->is_admin)
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-ban"></i></button>
                </div>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>