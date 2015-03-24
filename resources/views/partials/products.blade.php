@if(Auth::user()->is_admin)

<h2 class="text-center" >Add Product</h2>
<hr />
<div class="row">
    <div class="col-md-12">
        
        <form action="add_products" method="POST" id="product-form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group col-md-3">
                <label for=="product_name"><strong>Product Name:</strong></label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" />
            </div>
            <div class="form-group col-md-3">
                <label for=="product_description"><strong>Product Description:</strong></label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Description" />
            </div>
            <div class="form-group col-md-2">
                <label for=="product_price"><strong>Price:</strong></label>
                <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Price" />
            </div>
            <div class="form-group col-md-2">
                <label for=="product_stocks"><strong>Stocks:</strong></label>
                <input type="number" name="product_stocks" id="product_stocks" class="form-control" placeholder="Stocks" />
            </div>
             <div class="form-group col-md-2">
                <label for=="product_distributor"><strong>Distributor:</strong></label>
                <input type="text" name="product_distributor" id="product_distributor" class="form-control" placeholder="Distributor" />
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary pull-right" id="add-product"><i class="fa fa-plus"></i> &nbsp; Add Product</button>
            </div>
        </form>
    </div>
</div>
<hr />
@endif

<h2 class="text-center" >Products List</h2>
<form action="search_product" method="POST" id="product-search-form">
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <div class="row">
        <div class="form-group col-md-10">
            <input type="text" id="search_name" name="search_name" class="form-control col-lg-10" placeholder="Search: Product Name, Price, ..." />            
        </div>
        <div class="form-group col-md-2">           
            <button class="btn btn-primary pull-left" id="search_btn" style="width:100%;"><i class="fa fa-search"></i> &nbsp;Search</button>
        </div>
    </div>
</form>
<hr/>
<div class="row" id="products-ontainer" data-delete-url="{{URL::to('del_products')}}" data-edit-url="{{URL::to('edit_products')}}" data-token="{!!  csrf_token()   !!}">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stocks</th>
                    <th>Distributor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $products as $product )
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td style="min-width:100px">Php {{$product->price}}.00</td>
                    <td>{{$product->stocks}}</td>
                    <td>{{$product->distributor}}</td>
                    <td style="min-width:100px;">                        
                        @if(Auth::user()->is_admin)
                        <div class="btn-group" role="group">
                             <form action="add_sales" method="POST" id="sales-form">
                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                             </form>
                            <button type="button" class="btn btn-warning product-edit" data-id="{{$product->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger product-delete" data-id="{{$product->id}}" data-token="<?php echo csrf_token() ?>"><i class="fa fa-ban"></i></button>
                        </div>
                        @endif
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="edit-products-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Products</h4>
      </div>
      <div class="modal-body">
          <div class="input-group">
              <label>Product Name</label>
              <input type="text" id="edit-product-name" name="edit-product-name" class="form-control">
          </div>
          <div class="input-group">
              <label>Product Description</label>
              <input type="text" id="edit-product-description"  name="edit-product-description" class="form-control">
          </div>
          <div class="input-group">
              <label>Product Price</label>
              <input type="number" id="edit-product-price" name="edit-product-price" class="form-control">
          </div>
          <div class="input-group">
              <label>Product Stocks</label>
              <input type="number" id="edit-product-stocks" name="edit-product-stocks" class="form-control">
          </div>
          <div class="input-group">
              <label>Product Distributor</label>
              <input type="text" id="edit-product-distributor" name="edit-product-distributor" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit-product-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
