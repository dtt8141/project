@extends('app')

@section('content')

</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pharma Cart</div>
                <div class="panel-body">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">                            
                            <li role="presentation">
                                <a href="#users" aria-controls="users" role="tab" data-toggle="tab">
                                    <i class="fa fa-user"></i> Users
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#products" aria-controls="products" role="tab" data-toggle="tab">
                                   <i class="fa fa-cubes"></i> Products
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#distributor" aria-controls="distributor" role="tab" data-toggle="tab">
                                    <i class="fa fa-truck"></i> Distributors
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">
                                    <i class="fa fa-dollar"></i> Sales
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#customers" aria-controls="customers" role="tab" data-toggle="tab">
                                    <i class="fa fa-users"></i> Customers
                                </a>
                            </li>
                        </ul>
                        <br />
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="users">
                                @include('partials.users', ['users' => $data['users']])
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="products">
                                @include('partials.products', ['products' => $data['products']])
                            </div>
                            <div role="tabpanel" class="tab-pane" id="distributor">
                                @include('partials.distributors', ['distributors' => $data['distributors']]) 
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sales">
                                @include('partials.sales', ['sales' => $data['sales'], 'products' => $data['products']])
                            </div>
                            <div role="tabpanel" class="tab-pane" id="customers">
                                @include('partials.customers', ['customers' => $data['customers']]) 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
