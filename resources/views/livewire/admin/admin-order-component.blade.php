<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Products
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('order_message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                {{-- <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th> --}}
                                <th>Total</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Kode Pos</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    {{-- <td>${{ $order->subtotal }}</td>
                                    <td>${{ $order->discount }}</td>
                                    <td>${{ $order->tax }}</td> --}}
                                    <td>Rp. {{ $order->subtotal }}</td>
                                    <td>{{ $order->firstname }}</td>
                                    <td>{{ $order->lastname }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->Zipcode }}</td>
                                    <td>{{ $order->metode }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'deliverd')">Delivered</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a></li>
                                                </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>