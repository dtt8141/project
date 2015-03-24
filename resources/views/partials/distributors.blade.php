@if(Auth::user()->is_admin)
<h2 class="text-center" >Add Distributor</h2>

<hr />
<div class="row">
    <div class="col-md-12">
        <<form action="add_distributor" method="POST" id="distributor-form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group col-md-4">
                <label for=="name"><strong>Distributor Name:</strong></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Distributor Name" />
            </div>
            <div class="form-group col-md-4">
                <label for=="address"><strong>Address:</strong></label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" />
            </div>
            <div class="form-group col-md-4">
                <label for=="phone"><strong>Phone:</strong></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary pull-right" id="add-distributor"><i class="fa fa-plus"></i> &nbsp; Add Distributor</button>
            </div>
        </form>
    </div>
</div>
<hr/>
@endif

<h2 class="text-center" >Distributors List</h2>
<form action="search_distributor" method="POST" id="distributor-search-form">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <div class="row">
        <div class="form-group col-md-10">
            <input type="text" id="search_name" name="search_name" class="form-control col-lg-10" placeholder="Search: name, address, ..." />            
        </div>
        <div class="form-group col-md-2">           
            <button class="btn btn-primary pull-left" id="search_btn" style="width:100%;"><i class="fa fa-search"></i> &nbsp;Search</button>
        </div>
    </div>
</form>
<hr />
<div class="row" id="distributor-container" data-delete-url="{{URL::to('del_distributors')}}" data-edit-url="{{URL::to('edit_distributors')}}" data-token="{!!  csrf_token()   !!}">
    <div class="col-md-12">

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $distributors as $distributor )
        <tr>
            <td>{{$distributor -> id}}</td>
            <td>{{$distributor->name}}</td>
            <td>{{$distributor->address}}</td>
            <td>{{$distributor->phone}}</td>
            <td style="min-width:100px;">                        
              @if(Auth::user()->is_admin)
              <div class="btn-group" role="group">
                  <button type="button" class="btn btn-warning distributor-edit" data-id="{{$distributor->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger distributor-delete" data-id="{{$distributor->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-ban"></i></button>
              </div>
              @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>

<div class="modal fade" id="edit-distributor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Distributors</h4>
      </div>
      <div class="modal-body">
          <div class="input-group">
              <label>Distributor Name</label>
              <input type="text" id="edit-distributor-name" name="edit-distributor-name" class="form-control">
          </div>
          <div class="input-group">
              <label>Address</label>
              <input type="text" id="edit-distributor-address"  name="edit-distributor-address" class="form-control">
          </div>
          <div class="input-group">
              <label>Phone</label>
              <input type="text" id="edit-distributor-phone" name="edit-distributor-phone" class="form-control">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit-distributor-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
