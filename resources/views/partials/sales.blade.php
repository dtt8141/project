<div class="row">
    <div class="col-xs-6">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $data['sales'] as $datum )
                <tr>
                    <td>{{$datum->id}}</td>
                    <td>{{$datum->name}}</td>
                    <td>{{$datum->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-xs-6">
        <form action="add_sales" method="POST" id="sales-form">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
                <h2>Transaction</h2>
                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Product Name</label>

                        <select class="form-control" id="sf-product-name" name="sf-product-name">
                            @foreach( $products as $product )
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>                
            </div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" min="1" class="form-control" value="1"  id="sf-amount"  name="sf-amount" placeholder="Amount" />                
            </div>
            <div class="form-group">
                <label for="">Total Due</label>
                <input type="text"  class="form-control" placeholder="Total Due" id="sf-total-due" name="sf-total-due" readonly/>                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-dollar"></i> Purchase </button>
            </div>
        </form>                                       
    </div>
</div>