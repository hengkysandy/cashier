@extends('layout.master')

@section('title','Report - Cashier')

@section('content')
    @include('layout.sidebar')

    @include('layout.navigation')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Report </h3>
                </div>

                
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show Report</h2>
                            <ul class="nav navbar-right">
                                <li>
                                    
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-5">
                            Search by : Date and Time
                            <form method="post" action="{{url('filterReport')}}" class="form-horizontal" id="filter-form">
                                {{csrf_field()}}
                              <fieldset>
                               <div class="control-group">
                                   <div class="controls">
                                    <div class="input-prepend input-group">
                                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                      <input type="text" name="report_time" id="reservation-time" class="form-control" value="{{ !empty($report_datetime) ? $report_datetime : ''}}">
                                    </div>
                                  </div>
                                </div>
                                    
                              </fieldset>
                            </form>
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-3">
                            Search by : Month
                            <select class="form-control" id="month">
                                <option value=""> -------- Select Month -------- </option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            Search by : Year
                            <select class="form-control" id="year">
                                <option value=""> -------- Select Year -------- </option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table id="report_table" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">Month</th>
                                        <th class="column-title">Year</th>
                                        <th style="display: none" class="column-title">Customer Phone </th>
                                        <th style="display: none" class="column-title">Room Price</th>
                                        <th class="column-title">No.</th>
                                        <th class="column-title">Room </th>
                                        <th class="column-title">Customer Name </th>
                                        <th class="column-title">Booking Date </th>
                                        <th class="column-title">Start Time </th>
                                        <th class="column-title">End Time </th>
                                        <th class="column-title">Total Price </th>
                                        <th class="column-title">Status </th>
                                        <th class="column-title no-link last">
                                            <span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="color: green">
                                            <th colspan="10" style="text-align:right">Grand Total :</th>
                                            <th id="showTotal"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($transaction as $data)
                                    <tr class="even pointer">
                                        <td class=" ">{{$data->created_at->format('m')}}</td>
                                        <td class=" ">{{$data->created_at->year}}</td>
                                        <td style="display: none" class="customer_phone">{{$data->customer_phone}}</td>
                                        <td style="display: none" class="room_price">{{$data->room_price}}</td>
                                        <td class=" ">{{$data->id}}</td>
                                        <td class="room_name">{{$data->Room->name}}</td>
                                        <td class="customer_name">{{$data->customer_name}}</td>
                                        <td class=" ">{{$data->created_at->format('Y-m-d')}}</td>
                                        <td class=" ">{{$data->created_at->format('H:i')}}</td>
                                        <td class=" ">{{$data->created_at->format('H')+$data->booking_hour.":".$data->created_at->format('i') >= 24 ? ( $data->created_at->format('H')-24+$data->booking_hour.":".$data->created_at->format('i')) :  $data->created_at->format('H')+$data->booking_hour.":".$data->created_at->format('i') }}</td>
                                        <td class="grand_total">Rp. {{number_format($data->getTotalPrice()+$data->getTotalPriceOther()+$data->room_price)}}</td>
                                        <?php $btnClass = $data->status == "On Going" ? 'text-danger' : 'text-success' ?>
                                        <td class="{{$btnClass}}"><b>{{$data->status}}</b></td>
                                        <td class=" last">
                                            <button type="button" value="{{$data->id}}" class="btn btn-primary btn-xs btn-view-detail">View Detail</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-md modal-view-detail" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">View Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-1">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;" for="hour">No. Transaction
                                </label>
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="hour">:
                                </label>
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" style="text-align: left" for="hour" id="no-transaction">
                                </label>
                            </div>
                            <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-1">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left" for="hour">Employee
                                </label>
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="hour">:
                                </label>
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" style="text-align: left" for="hour" id="employee">
                                </label>
                            </div>
                            <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-1">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left" for="hour">Customer Name
                                </label>
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="hour">:
                                </label>
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" style="text-align: left" for="hour" id="curr_customer_name">
                                </label>
                            </div>
                            <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-1">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left" for="hour">Customer Phone
                                </label>
                                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="hour">:
                                </label>
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" style="text-align: left" for="hour" id="curr_customer_phone">
                                </label>
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-offset-1">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </thead>
                                    <tbody class="report-tbody">
                                        
                                    </tbody>
                                </table>
                                <hr>
                                <p style="text-align: right;font-weight: bold">Grand Total : <span id="curr_grand_total"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){

            $('#report_table').DataTable( {
                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;
                        
                        var arrPrice = api.column( 10 ).data();
                        var total = 0;
                        for (var i = arrPrice.length - 1; i >= 0; i--) {
                            total += parseInt(arrPrice[i].replace(",","").substring(3));
                        }

                        $('#showTotal').html('Rp. ' + new Intl.NumberFormat().format(total));

                    },
                    "columnDefs": [
                            {
                                "targets": [ 0,1 ],
                                "visible": false,
                                "searchable": true
                            }
                        ],
                } );

            // rp = $('#report_table').DataTable({
            //     "columnDefs": [
            //                 {
            //                     "targets": [ 0,1 ],
            //                     "visible": false,
            //                     "searchable": true
            //                 }
            //             ],
            // });

            $('#month').on('change', function(){
                rp.column(0).search(this.value).draw();
            });

            $('#year').on('change', function(){
                rp.column(1).search(this.value).draw();
            });

            //datetime range picker
            $('.applyBtn').html('Search');
            $(".applyBtn").on("click", function() {
                $("#reservation-time").on("change paste keyup", function() {
                   $('#filter-form').submit();
                });
            });

            function zeroPad(numberStr) {
              return numberStr.padStart(2, "0");
            }
            

            $('.btn-view-detail').click(function(e){
                e.preventDefault();
                $('.modal-view-detail').find('#myModalTitle').html("View Detail");
                $('#no-transaction').html( $(this).val() );
                $('#curr_customer_name').html( $(this).parent().parent().find('.customer_name').text() );
                $('#curr_customer_phone').html( $(this).parent().parent().find('.customer_phone').text() );

                $('.report-tbody tr').remove();

                $('.report-tbody').append('<tr><td>'+ $(this).parent().parent().find('.room_name').text() +'</td><td>Rp. '+ $(this).parent().parent().find('.room_price').text() +',-</td><td></td><td>Rp. '+$(this).parent().parent().find('.room_price').text()+',-</td></tr>');

                $('#curr_grand_total').text($(this).parent().parent().find('.grand_total').text()+',-');

                $.ajax({
                    url: $fullpathUrl+'/getTransaction/'+$(this).val(),
                    type: 'GET',
                    async : false,
                    success: function(response){
                        $('#employee').html(response["employee_name"]);

                        

                        $.each(response["transactionDetail"], function(index, value){
                            if(value["item_id"]!=null){
                                $.ajax({
                                    url: $fullpathUrl+'/getItem/'+value["item_id"],
                                    type: 'GET',
                                    success: function(responseItem){
                                        $('.report-tbody').append('<tr><td>'+ responseItem["item"]["name"] +'</td><td>Rp. '+ responseItem["item"]["price"] +',-</td><td>'+ value["quantity"] +' pcs</td><td>Rp. '+responseItem["item"]["price"]*value["quantity"]+',-</td></tr>');
                                    }
                                });
                            } else {
                                $.ajax({
                                    url: $fullpathUrl+'/getDetailTransaction/'+value["id"],
                                    type: 'GET',
                                    success: function(responseItem){
                                        console.log(responseItem);
                                        $('.report-tbody').append('<tr><td>'+ responseItem["transactionDetail"]["other_item_name"] +'</td><td>Rp. '+ responseItem["transactionDetail"]["other_item_price"] +',-</td><td>'+ value["quantity"] +' pcs</td><td>Rp. '+responseItem["transactionDetail"]["other_item_price"]*value["quantity"]+',-</td></tr>');
                                    }
                                });
                            }
                        });
                    } 
                });


                $('.modal-view-detail').show();
            });

            $('.btn-close').click(function(){
                $('.modal-view-detail').hide();
            });

            $('.showSelect').hide();

            $('.toggleSelect').click(function(){
               $('.showSelect').toggle();
            });

        });
    </script>
@endsection