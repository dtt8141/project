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
<form action="search_customer" method="POST" id="user-search-form">
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
<div class="row">
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
                                <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-ban"></i></button>
                            </div>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
