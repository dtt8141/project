@if(Auth::user()->is_admin)
<h2 class="text-center" >Add Distributor</h2>
<hr />
<div class="row">
    <div class="col-md-12">
        <form action="">
            <div class="form-group col-md-4">
                <label for=="product_name"><strong>Distributor Name:</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Enter Distributor Name" />
            </div>
            <div class="form-group col-md-4">
                <label for=="product_description"><strong>Address:</strong></label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" />
            </div>
            <div class="form-group col-md-4">
                <label for=="product_price"><strong>Phone:</strong></label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" />
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> &nbsp; Add Distributor</button>
            </div>
        </form>
    </div>
</div>
<hr/>
@endif

<h2 class="text-center" >Distributors List</h2>

<hr /><table class="table">
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
                  <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fa fa-ban"></i></button>
              </div>
              @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>