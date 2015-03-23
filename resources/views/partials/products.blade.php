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
                <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> &nbsp; Add Product</button>
            </div>
        </form>
    </div>
</div>
<hr />
@endif

<h2 class="text-center" >Products List</h2>
<hr/>
<div class="row">
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
