@if(Auth::user()->is_admin)
<h2 class="text-center" >Add Customer</h2>
<hr />
<div class="row">
    <div class="col-md-12">
      <form action="add_customer" method="POST" id="customer-form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group col-md-4">
                <label for=="name"><strong>Name:</strong></label>
                <input type="text" id="customer_name" name="name" class="form-control" placeholder="Enter Name" />
            </div>
            <div class="form-group col-md-4">
                <label for=="address"><strong>Address:</strong></label>
                <input type="text" id="customer_address" name="address" class="form-control" placeholder="Enter Address" />
            </div>
            <div class="form-group col-md-4">
                <label for=="phone"><strong>Phone:</strong></label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" />
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary pull-right" id="add-customer"><i class="fa fa-plus"></i> &nbsp; Add Customer</button>
            </div>
        </form>
    </div>
</div>
<hr />
@endif

<h2 class="text-center" >Customers List</h2>
<form action="search_customer" method="POST" id="customer-search-form">
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
<hr/>
<div class="row"  id="customer-container" data-delete-url="{{URL::to('del_customers')}}" data-edit-url="{{URL::to('edit_customers')}}" data-token="{!!  csrf_token()   !!}">
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
                @foreach( $customers as $customer )
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->phone}}</td>
                    <td style="min-width:100px;">                        
                         @if(Auth::user()->is_admin)
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-warning customer-edit" data-id="{{$customer->id}}" data-token="<?php echo csrf_token() ?>" ><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger customer-delete" data-id="{{$customer->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-ban"></i></button>
                            </div>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="edit-customer-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Customers</h4>
      </div>
      <div class="modal-body">
          <div class="input-group">
              <label>Customer Name</label>
              <input type="text" id="edit-customer-name" name="edit-customer-name" class="form-control">
          </div>
          <div class="input-group">
              <label>Address</label>
              <input type="text" id="edit-customer-address"  name="edit-customer-address" class="form-control">
          </div>
          <div class="input-group">
              <label>Phone</label>
              <input type="text" id="edit-customer-phone" name="edit-customer-phone" class="form-control">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit-customer-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
