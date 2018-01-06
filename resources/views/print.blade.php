<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Print - Cashier</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{ asset('css/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/build/css/custom.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="main_container">
            <div class="col-md-4 col-md-offset-4" style="background-color: white">
                <div class="col-middle text-center">
                    <h1>Transaction</h1>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">No. Transaction</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->id }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Customer Name</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->customer_name }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Customer Phone</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->customer_phone }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Booking Date</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->created_at->format('j F Y h:i A') }}</div>
                        </div>
                    </div>
                    <h2>Transaction Detail</h2>
                    <div class="col-md-12">
                        <table class="going_item table table-striped text-justify">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $transaction->Room->name }}</td>
                                    <td>Rp. {{ number_format($transaction->room_price,0,'','.') }},-</td>
                                    <td>{{ $transaction->booking_hour }} hours</td>
                                    <td>Rp. {{ number_format($transaction->room_price * $transaction->booking_hour,0,'','.') }},-</td>
                                </tr>
                                @foreach($transaction->TransactionDetail as $index => $detail)
                                    <tr>
                                        <td>{{ $detail->item_id!=""?$detail->Item->name:$detail->other_item_name }}</td>
                                        <td>Rp. {{ $detail->item_id!=""?number_format($detail->Item->price,0,'','.'):number_format($detail->other_item_price,0,'','.') }},-</td>
                                        <td>{{ $detail->quantity }} pcs</td>
                                        <td>Rp. {{ $detail->item_id!=""?number_format($detail->Item->price * $detail->quantity,0,'','.'):number_format($detail->other_item_price * $detail->quantity,0,'','.') }},-</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <p style="font-weight: bold; text-align: right;">Grand Total : Rp. {{number_format($transaction->getTotalPrice()+$transaction->getTotalPriceOther()+($transaction->room_price*$transaction->booking_hour))}}</p>
                    </div>
                    <h6>Thanks from CS : {{ $transaction->Employee->name }}</h6>
                    <h5>Copyright &copy; Cashier - 2017</h5>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-2">
                <button type="button" class="btn btn-primary fa fa-download" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('css/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('css/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('css/vendors/fastclick/lib/fastclick.js') }}"></script>

    <!-- NProgress -->
    <script src="{{ asset('css/vendors/nprogress/nprogress.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('css/build/js/custom.min.js') }}"></script>
</body>
</html>