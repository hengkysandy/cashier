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
                        <div class="col-md-4 col-sm-4 col-xs-12 tab-pane fade active in tab_content1" role="tabpanel" aria-labelledby="room-tab">
                            <div class="x_panel tile fixed_height_210">
                                <div class="x_title" style="margin-bottom: 0px;">
                                    <h2>{{ $room->name }}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            <form class="form-book">
                                                <input type="hidden" class="id" value="{{ $room->id }}">
                                                <input type="hidden" class="type" value="{{ $room->type }}">
                                                <input type="hidden" class="price" value="{{ $room->price }}">
                                                <input type="submit" value="{{ $room->name!=""?"Book":"Detail" }}" class="btn {{ $room->name!=""?"btn-success":"btn-danger" }}">
                                            </form>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table align="center" style="width: 100%">
                                        <tr>
                                            <th><h5>Booking Name</h5></th>
                                            <td>:</td>
                                            <td><h5>{{ $room->name!=""?$room->name:"-" }}</h5></td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Hour</h5></th>
                                            <td>:</td>
                                            <td><h5>{{ $room->name!=""?$room->name:"-" }}</h5></td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Date</h5></th>
                                            <td>:</td>
                                            <td><h5>{{ $room->name!=""?$room->name:"-" }}</h5></td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Price</h5></th>
                                            <td>:</td>
                                            <td><h5>Rp. {{ $room->price!=""?number_format($room->price,0,'','.'):0 }},-</h5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4 col-sm-4 col-xs-12 tab-pane fade tab_content2" role="tabpanel" aria-labelledby="hall-tab">
                            <div class="x_panel tile fixed_height_210">
                                <div class="x_title" style="margin-bottom: 0px;">
                                    <h2>{{ $room->name }}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li>
                                            <form class="form-book">
                                                <input type="hidden" class="id" value="{{ $room->id }}">
                                                <input type="hidden" class="type" value="{{ $room->type }}">
                                                <input type="hidden" class="price" value="{{ $room->price }}">
                                                <input type="submit" value="Book" class="btn {{ $room->name!=""?"btn-success":"btn-danger" }}">
                                            </form>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table align="center" style="width: 100%">
                                        <tr>
                                            <th><h5>Booking Name</h5></th>
                                            <td>:</td>
                                            <td><h5>{{ $room->name!=""?$room->name:"-" }}</h5></td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Hour</h5></th>
                                            <td>:</td>
                                            <td><h5>{{ $room->name!=""?$room->name:"-" }}</h5></td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Date</h5></th>
                                            <td>:</td>
                                            <td><h5>{{ $room->name!=""?$room->name:"-" }}</h5></td>
                                        </tr>
                                        <tr>
                                            <th><h5>Booking Price</h5></th>
                                            <td>:</td>
                                            <td><h5>Rp. {{ $room->price!=""?number_format($room->price,0,'','.'):0 }},-</h5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="modal bs-example-modal-md modal-book" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle"></h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="form-horizontal form-label-left">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Customer Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="phone" class="form-control col-md-7 col-xs-12" name="phone" placeholder="Customer Phone...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Booking Hour<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="hour" class="form-control col-md-7 col-xs-12" name="hour" placeholder="Booking Hour...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Booking Price<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="price" class="form-control col-md-7 col-xs-12" name="price" placeholder="Booking Price...">
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
@endsection

@section('script')
    <script>
        $items = <?php echo $items?>;

        $(".form-book").submit(function(e){
            e.preventDefault();
            $('#myModalTitle').html('Booking ' + $(this).children('.type').val() + ' Detail');
            $('.roomId').val($(this).children('.id').val());
            $('.roomType').val($(this).children('.type').val());
            $('.modal-book').find('#price').val($(this).children('.price').val());
            $('.modal-book').show();
        });

        $('.btn-close').click(function(){
            $('.modal-book').hide();
        });

        $('.btn-add-item').click(function(e){
            e.preventDefault();
            $item = '';
            $.each($items,function(index, value){
                $item = $item + '<option value="'+value.name+'">'+value.name+'</option>';
            });
            $('.add-item').append('<div class="item form-group"><div class="col-md-4 col-sm-offset-3"><select class="form-control itemName" name="itemName">'+$item+'<option value="other">other</option></select></div><div class="col-md-2"><input type="number" id="itemQuantity" class="form-control col-md-2 col-xs-12 itemQuantity" name="itemQuantity" placeholder="Qty"></div><div class="col-md-2"><input type="number" id="itemPrice" class="form-control col-md-2 col-xs-12 itemPrice" name="itemPrice" placeholder="Price" value={{ $items[0]->price }}></div><div class="col-sm-1"><button type="button" class="close form-control btn-minus"><i class="fa fa-minus" style="color: red"></i></button></div><div class="add-other"></div></div>');
        });

        $(document).on('change','.itemName',function(){
            $item = '';
            $.each($items,function(index, value){
                if($('.itemName').val() == value.name)
                    $('.itemPrice').val(value.price);
            });

            if($(this).val() == 'other') {
                $(this).parent().parent().find('.add-other').append('<div class="col-md-8 col-sm-offset-3"><input type="text" id="itemOther" class="form-control col-md-12 col-xs-12 itemOther" name="itemOther" placeholder="Item Name..."></div>');
                $('.itemPrice').val("");
            }
            else
                $(this).parent().parent().find('.add-other').children().remove();
        });

        $(document).on('click','.btn-minus',function(){
            $(this).parent().parent().remove();
        });
    </script>
@endsection