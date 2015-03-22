<div class="row">
    <div class="col-xs-6">
        <table class="table">
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
        <form action="">
            <div class="form-group">
                <h2>Transaction</h2>
                <label for="">Product Name</label>
                <input type="" class="form-control" placeholder="Product Name" />
                <label for="">Amount</label>
                <input type="number" min="1" class="form-control" placeholder="Amount" />
            </div>
        </form>                                       
    </div>
</div>