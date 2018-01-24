@extends('layout.master')

@section('title','Home - Cashier')

@section('content')

    @include('layout.sidebar')

    @include('layout.navigation')

    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Home <small>Show Room and Hall</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <br>

        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active" style="width: 48%"><a href=".tab_content1" id="room-tab" role="tab" data-toggle="tab" aria-expanded="true">Room</a>
                    </li>
                    <li role="presentation" class="" style="width: 48%"><a href=".tab_content2" role="tab" id="hall-tab" data-toggle="tab" aria-expanded="false">Hall</a>
                    </li>
                </ul>
            </div>

            <div class="row tab-content" id="myTabContent">
                @foreach($rooms as $key => $room)
                    @if($room->type == 'Room')
                        <?php $flag = 0; $id = 0; $status = ""; ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 tab-pane fade active in tab_content1" role="tabpanel" aria-labelledby="room-tab">
                            <div class="x_panel tile fixed_height_285">
                                <div class="x_title" style="margin-bottom: 0px;">
                                    <h2>{{ $room->name }}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                <form class="form-book">
                                                    <input type="hidden" class="id" value="{{ $room->id }}">
                                                    <input type="hidden" class="type" value="{{ $room->type }}">
                                                    <input type="hidden" class="price" value="{{ $room->price }}">
                                                    <input type="submit" value="Book" class="btn btn-success" disabled="">
                                                </form>
                                            @elseif( $room->Transaction->where('status','On Going')->first() )
                                                <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                <form class="form-going">
                                                    <input type="hidden" class="going_id" value="{{ $room->Transaction->where('status','On Going')->first()->id }}">
                                                    <input type="hidden" class="going_type" value="{{ $room->type }}">
                                                    <a href="{{url('printTransaction/'.$room->Transaction->where('status','On Going')->first()->id)}}" target="_blank"><button type="button" class="btn btn-primary btn-print" disabled>Print</button></a>
                                                    <input type="submit" value="Edit" class="btn btn-info" disabled="">
                                                </form>
                                            @endif
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table align="center" style="width: 100%">
                                        <tr>
                                            <th><h5>Booking Name</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->customer_name }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Date</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->created_at }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking End</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5 class="getBookingEnd">
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->created_at->addHours($room->Transaction->where('status','On Going')->first()->booking_hour) }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Hour</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->booking_hour }} Hours
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Price</h5></th>
                                            <td>:</td>
                                            <td><h5>Rp. {{ $room->price!=""?number_format($room->price,0,'','.'):0 }},- /hour</h5></td>
                                        </tr>
                                    </table>
                                    <form class="form-finalize-book">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $id }}" id="id">
                                        <button type="submit" class="btn btn-danger col-md-4 col-md-offset-4 btn-finalize" style="visibility: {{ $status != "Finalize" && $status != "" ? "none":"hidden" }}; margin-bottom: 5%;" disabled>Finalize</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <?php $flag = 0; $id = 0; $status = ""; ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 tab-pane fade tab_content2" role="tabpanel" aria-labelledby="hall-tab">
                            <div class="x_panel tile fixed_height_285">
                                <div class="x_title" style="margin-bottom: 0px;">
                                    <h2>{{ $room->name }}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                <form class="form-book">
                                                    <input type="hidden" class="id" value="{{ $room->id }}">
                                                    <input type="hidden" class="type" value="{{ $room->type }}">
                                                    <input type="hidden" class="price" value="{{ $room->price }}">
                                                    <input type="submit" value="Book" class="btn btn-success" disabled="">
                                                </form>
                                            @elseif( $room->Transaction->where('status','On Going')->first() )
                                                <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                <form class="form-going">
                                                    <input type="hidden" class="going_id" value="{{ $room->Transaction->where('status','On Going')->first()->id }}">
                                                    <input type="hidden" class="going_type" value="{{ $room->type }}">
                                                    <a href="{{url('printTransaction/'.$room->Transaction->where('status','On Going')->first()->id)}}" target="_blank"><button type="button" class="btn btn-primary btn-print" disabled>Print</button></a>
                                                    <input type="submit" value="Edit" class="btn btn-info" disabled="">
                                                </form>
                                            @endif
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table align="center" style="width: 100%">
                                        <tr>
                                            <th><h5>Booking Name</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->customer_name }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Date</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->created_at }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking End</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5 class="getBookingEnd">
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->created_at->addHours($room->Transaction->where('status','On Going')->first()->booking_hour) }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Hour</h5></th>
                                            <td>:</td>
                                            <td>
                                                <h5>
                                                    @if( empty($room->Transaction->where('status','On Going')->first()) )
                                                        -
                                                    @elseif( $room->Transaction->where('status','On Going')->first() )
                                                        <?php $id = $room->Transaction->where('status','On Going')->first()->id; $status = $room->Transaction->where('status','On Going')->first()->status; ?>
                                                        {{ $room->Transaction->where('status','On Going')->first()->booking_hour }}
                                                    @endif
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Price</h5></th>
                                            <td>:</td>
                                            <td><h5>Rp. {{ $room->price!=""?number_format($room->price,0,'','.'):0 }},- /hour</h5></td>
                                        </tr>
                                    </table>
                                    <form class="form-finalize-book">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $id }}" id="id">
                                        <button type="submit" class="btn btn-danger col-md-4 col-md-offset-4 btn-finalize" style="visibility: {{ $status != "Finalize" && $status != "" ? "none":"hidden" }}; margin-bottom: 5%;" disabled>Finalize</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="modal bs-example-modal-lg modal-book" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left form-add-book">
                        {!! csrf_field() !!}
                        <input type="hidden" name="roomId" class="roomId" value="">
                        <input type="hidden" name="roomType" class="roomType" value="">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Customer Name...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Customer Phone
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="phone" class="form-control col-md-7 col-xs-12" name="phone" placeholder="Customer Phone...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Booking Hour<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" class="form-control col-md-7 col-xs-12 bookingHour" name="hour" placeholder="Booking Hour..." min="0">
                                <input type="hidden" name="time" class="bookingHour">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Booking Price<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" class="form-control col-md-7 col-xs-12 bookingPrice" name="price" placeholder="Booking Price..." disabled="">
                                <input type="hidden" name="price" class="bookingPrice">
                            </div>
                        </div>
                        <div class="add-item">
                        </div>
                        <div class="item form-group">
                            <div class="col-md-8 col-sm-offset-3">
                                <button type="button" class="btn btn-default btn-success btn-add-item">Add Item</button>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-sm-offset-8">
                                <button type="reset" class="btn btn-default btn-close">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-xs modal-going" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalGoing"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal form-label-left">
                        <form class="form-edit-book">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Name
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12 going_name" name="name" disabled="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Customer Phone
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12 going_phone" name="phone" disabled="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Booking Date
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12 going_date" name="date" disabled="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Booking End
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12 going_end" name="date" disabled="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Booking Hour
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control col-md-7 col-xs-12 going_hour" name="hour">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Booking Price
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12 going_price" name="price" disabled="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="going_item table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Item Price</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <p style="text-align: right;font-weight: bold;margin-right: 83px;">Grand Total : <span id="curr_grand_total"></span></p>
                            </div>
                            <hr>
                            <input type="hidden" name="id" class="going_edit_id">
                            <div class="edit-item">
                            </div>
                            <div class="item form-group">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-default btn-success btn-edit-item">Add Item</button>
                                </div>
                                <div class="col-md-4 col-sm-offset-4">
                                    <button type="reset" class="btn btn-default btn-close">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm modal-confirmation-book" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-no"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myConfirmationTitle"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-confirmation-book">
                        <input type="hidden" name="id" id="transaction_id">
                        <div class="item form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-danger col-sm-offset-3">Yes</button>
                                <button type="reset" class="btn btn-info btn-no col-sm-offset-1">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(count($errors) > 0)
        <div class="checkError"></div>
    @endif
@endsection

@section('script')
    <script>
        $items = <?php echo $items?>;

        $(document).ready(function(){
           if($('.checkError').length!=0){
               new PNotify({
                   title: 'Failed Booking',
                   text: 'Booking Date Has Booked Please Choose Another Date !!!',
                   type: 'error',
                   styling: 'bootstrap3'
               });
           }
        });

        $(".form-going").submit(function(e){
            e.preventDefault();
            $('#myModalGoing').html('Booking ' + $(this).children('.going_type').val() + ' Detail');
            $('.going_item tbody tr').remove();
            $.ajax({
                url: $fullpathUrl+'/getTransaction/'+$(this).children('.going_id').val(),
                type: 'GET',
                async : false,
                success: function(response){
                    $('.going_edit_id').val(response["transaction"]["id"]);
                    $('.going_name').val(response["transaction"]["customer_name"]);
                    $('.going_phone').val(response["transaction"]["customer_phone"]);
                    $('.going_date').val(response["transaction"]["created_at"]);
                    $('.going_end').val(response["transaction"]["booking_end"]);
                    $('.going_hour').val(response["transaction"]["booking_hour"]);
                    $('.going_price').val(response["transaction"]["room_price"]);

                    $('#curr_grand_total').text('Rp. '+response["grand"]+',-');

                    $('.going_item tbody').append('<tr><td>'+ response["room"]["name"] +'</td><td>Rp. '+ response["transaction"]["room_price"] +',-</td><td>'+response["transaction"]["booking_hour"]+' hours</td><td>Rp. '+(response["transaction"]["room_price"]*response["transaction"]["booking_hour"])+',-</td></tr>');

                    $.each(response["transactionDetail"], function(index, value){
                        if(value["item_id"]!=null){
                            $.ajax({
                                url: $fullpathUrl+'/getItem/'+value["item_id"],
                                type: 'GET',
                                success: function(responseItem){
                                    $('.going_item tbody').append('<tr><td>'+ responseItem["item"]["name"] +'</td><td>Rp. '+ responseItem["item"]["price"] +',-</td><td>'+ value["quantity"] +' pcs</td><td>Rp. '+responseItem["item"]["price"]*value["quantity"]+',-</td></tr>');
                                }
                            });
                        } else {
                            $.ajax({
                                url: $fullpathUrl+'/getDetailTransaction/'+value["id"],
                                type: 'GET',
                                success: function(responseItem){
                                    $('.going_item tbody').append('<tr><td>'+ responseItem["transactionDetail"]["other_item_name"] +'</td><td>Rp. '+ responseItem["transactionDetail"]["other_item_price"] +',-</td><td>'+ value["quantity"] +' pcs</td><td>Rp. '+responseItem["transactionDetail"]["other_item_price"]*value["quantity"]+',-</td></tr>');
                                }
                            });
                        }
                    });

                    
                } 
            });
            
            $('.modal-going').show();
        });

        $(".form-book").find('input[type=submit]').removeAttr('disabled');
        $(".form-going").find('input[type=submit]').removeAttr('disabled');
        $(".btn-print").removeAttr('disabled');
        $(".btn-finalize").removeAttr('disabled');

        $(".form-book").submit(function(e){
            e.preventDefault();
            $('#myModalTitle').html('Booking ' + $(this).children('.type').val() + ' Detail');
            $('.roomId').val($(this).children('.id').val());
            $('.roomType').val($(this).children('.type').val());
            $('.modal-book').find('.bookingPrice').val($(this).children('.price').val());
            $('.modal-book').show();
        });

        $('.btn-close').click(function(){
            $('.modal-book').hide();
            $('.modal-going').hide();
        });

        $('.btn-no').click(function(){
            $('.modal-confirmation-book').hide();
        });

        $('.btn-add-item').click(function(e){
            e.preventDefault();
            $item = '';
            $.each($items,function(index, value){
                $item = $item + '<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('.add-item').append('<div class="item form-group"><div class="col-md-4 col-sm-offset-3"><select class="form-control itemName" name="itemName[]">'+$item+'<option value="other">other</option></select></div><div class="col-md-2"><input type="number" id="itemQuantity" min="1" value="1" class="form-control col-md-2 col-xs-12 itemQuantity" name="itemQuantity[]" placeholder="Qty"></div><div class="col-md-2"><input type="number" id="itemPrice" class="form-control col-md-2 col-xs-12 itemPrice" name="itemPrice[]" placeholder="Price" value={{ $items[0]->price }} disabled><input type="hidden" name="itemPrice[]" class="itemPrice" id="itemPrice" value={{ $items[0]->price }}></div><div class="col-sm-1"><button type="button" class="close form-control btn-minus"><i class="fa fa-minus" style="color: red"></i></button></div><div class="add-other"><div class="col-md-8 col-sm-offset-3"><input type="text" id="itemOther" class="form-control col-md-12 col-xs-12 itemOther" name="itemOther[]" placeholder="Item Name..." style="display:none" val=""></div></div></div>');
        });

        $('.btn-edit-item').click(function(e){
            e.preventDefault();
            $item = '';
            $.each($items,function(index, value){
                $item = $item + '<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('.edit-item').append('<div class="item form-group"><div class="col-md-5"><select class="form-control itemName" name="itemName[]">'+$item+'<option value="other">other</option></select></div><div class="col-md-3"><input type="number" id="itemQuantity" min="1" value="1" class="form-control col-md-3 col-xs-12 itemQuantity" name="itemQuantity[]" placeholder="Qty"></div><div class="col-md-3"><input type="number" id="itemPrice" class="form-control col-md-2 col-xs-12 itemPrice" name="itemPrice[]" placeholder="Price" value={{ $items[0]->price }} disabled><input type="hidden" name="itemPrice[]" class="itemPrice" id="itemPrice" value={{ $items[0]->price }}></div><div class="col-sm-1"><button type="button" class="close form-control btn-edit-minus"><i class="fa fa-minus" style="color: red"></i></button></div><div class="add-other"><div class="col-md-11"><input type="text" id="itemOther" class="form-control col-md-12 col-xs-12 itemOther" name="itemOther[]" placeholder="Item Name..." style="display:none" val=""></div></div></div>');
        });

        $(document).on('change','.itemName',function(){
            $item = '';
            $price = 0;
            $id = $(this).parent().parent().find('.itemName').val();
            $.each($items,function(index, value){
                if($id == value.id){
                    $price = value.price;
                    return;
                }
            });
            $(this).parent().parent().find('.itemPrice').val($price);
            if($(this).val() == 'other'){
                $(this).parent().parent().find('.add-other .itemOther').css("display","block");
                $(this).parent().parent().find('.itemPrice').val("");
                $(this).parent().parent().find('.itemPrice').removeAttr('disabled');
                $(this).parent().parent().find('input[type=hidden]').removeAttr('name');
            }
            else
                $(this).parent().parent().find('.add-other .itemOther').css("display","none");
        });

        $(document).on('click','.btn-minus',function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click','.btn-edit-minus',function(){
            $(this).parent().parent().remove();

            if($('.btn-edit-minus').length == 0)
                $('.btn-submit').hide();
        });

        $('.form-add-book').submit(function(e){
            e.preventDefault();
            $('#myConfirmationTitle').text("Add Book Confirmation");
            $('.modal-confirmation-book').show();
        });

        $('.form-finalize-book').submit(function(e){
            e.preventDefault();
            $('#myConfirmationTitle').text("Finalize Book");
            $('#transaction_id').val($(this).find('#id').val());
            $('.modal-confirmation-book').show();
        });

        $('.form-edit-book').submit(function(e){
            e.preventDefault();
            $('#myConfirmationTitle').text("Edit Book Confirmation");
            $('.modal-confirmation-book').show();
        });

        $('.form-confirmation-book').submit(function(e){
            e.preventDefault();
            if($('#myConfirmationTitle').text() == "Edit Book Confirmation") {
                $.ajax({
                    url: $fullpathUrl+'updateTransaction',
                    type: 'POST',
                    data: $('.form-edit-book').serialize(),
                    success: function (response) {
                        if (response == "success")
                            location.href = $fullpathUrl+'/home'
                    }
                });
            } else if ($('#myConfirmationTitle').text() == "Finalize Book") {
                location.href = $fullpathUrl+"/updateStatus/"+$(this).find('#transaction_id').val();
            } else {
                $.ajax({
                    url: $fullpathUrl+'createBooking',
                    type: 'POST',
                    data: $('.form-add-book').serialize(),
                    success: function (response) {
                        if (response == "success")
                            location.href = $fullpathUrl+'/home'
                    }
                });
            }
        });
    </script>
@endsection