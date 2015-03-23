<h2 class="text-center" >Users List</h2>
<form action="search_user" method="POST" id="user-search-form">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <div class="row">
        <div class="form-group col-md-10">
            <input type="text" id="search_name" name="search_name" class="form-control col-lg-10" placeholder="Search: name, email, ..." />            
        </div>
        <div class="form-group col-md-2">           
            <button class="btn btn-primary pull-left" id="search_btn" style="width:100%;"><i class="fa fa-search"></i> &nbsp;Search</button>
        </div>
    </div>
</form>
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