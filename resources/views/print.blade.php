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
                            <label class="col-md-5">Booking Name</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->customer_name }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Booking Phone</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->customer_phone }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Booking Date</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->start_time->format('d-m-Y') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Booking Hour</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">{{ $transaction->booking_hour }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-5">Booking Price</label>
                            <div class="col-md-2">:</div>
                            <div class="col-md-5">Rp. {{ number_format($transaction->room_price,0,'','.') }},-</div>
                        </div>
                        <hr>
                    </div>
                    <h2>Transaction Detail</h2>
                    <div class="col-md-12">
                        <table class="going_item table table-striped text-justify">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Item Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->TransactionDetail as $index => $detail)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $detail->item_id!=""?$detail->Item->name:$detail->other_item_name }}</td>
                                        <td>Rp. {{ $detail->item_id!=""?number_format($detail->Item->price,0,'','.'):number_format($detail->other_item_price,0,'','.') }},-</td>
                                        <td>{{ $detail->quantity }} pcs</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <h6>Thanks from CS : {{ $transaction->Employee->name }}</h6>
                    <h5>Copyright &copy; Cashier - 2017</h5>
                </div>
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