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
<hr/>
<div class="row" id="users-container" data-delete-url="{{URL::to('del_users')}}" data-edit-url="{{URL::to('edit_users')}}" data-token="{!!  csrf_token()   !!}">
    <div class="col-md-12">
<table class="table table-hover">
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
                    <button type="button" class="btn btn-warning user-edit" data-id="{{$user->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger user-delete" data-id="{{$user->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-ban"></i></button>
                </div>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>

<div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
      </div>
      <div class="modal-body">
          <div class="input-group">
              <label>Name</label>
              <input type="text" id="edit-users-name" name="edit-user-name" class="form-control">
          </div>
          <div class="input-group">
              <label>E-mail</label>
              <input type="text" id="edit-users-email"  name="edit-user-email" class="form-control">
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit-user-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
