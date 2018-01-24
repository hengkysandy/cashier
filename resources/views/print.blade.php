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

                    <h3>NAMA TOKO</h3>
                    <h6>ALAMAT TOKO</h6>
                    <h6>NOMOR TELP TOKO</h6>

                    <div class="col-md-12">
                        <table style="text-align: left; text-indent: 20">
                            <tr>
                                <td>No. Transaction</td>
                                <td>:</td>
                                <td>&nbsp; &nbsp; {{ $transaction->id }}</td>
                            </tr>
                            <tr>
                                <td>Customer Name</td>
                                <td>:</td>
                                <td>&nbsp; &nbsp; {{ $transaction->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>Customer Phone</td>
                                <td>:</td>
                                <td>&nbsp; &nbsp; {{ $transaction->customer_phone }}</td>
                            </tr>
                            <tr>
                                <td>Booking Date</td>
                                <td>:</td>
                                <td>&nbsp; &nbsp; {{ $transaction->created_at->format('j F Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table class="going_item table table-striped text-justify">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
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
                                    <tr>
                                        <td colspan="4" style="text-align: right;">
                                            Grand Total : Rp. {{number_format($transaction->getTotalPrice()+$transaction->getTotalPriceOther()+($transaction->room_price*$transaction->booking_hour))}}
                                        </td>
                                    </tr>
                            </tbody>
                        </table>

                        <h5>Thank You!</h5>

                    </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            window.print();
            window.close();
        });
    </script>
</body>
</html>