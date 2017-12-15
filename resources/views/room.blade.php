@extends('layout.master')

@section('title','Item - Cashier')

@section('content')
    @include('layout.sidebar')

    @include('layout.navigation')

    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Room</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Room</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <form class="form-new-room">
                                    <input type="submit" value="New Room" class="btn btn-success" disabled="">
                                </form>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Room Name </th>
                                        <th class="column-title">Room Price </th>
                                        <th class="column-title">Room Type </th>
                                        <th class="column-title">Room Status </th>
                                        <th class="column-title no-link last">
                                            <span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $room)
                                        <tr class="even pointer">
                                            <td style="display: none" class="room_id">{{ $room->id }}</td>
                                            <td class="room_name">{{ $room->name }}</td>
                                            <td class="room_price">Rp. {{ number_format($room->price,0,'','.') }},- </td>
                                            <td class="room_type">{{ $room->type }}</td>
                                            <td class=" ">Book</td>
                                            <td class=" last">
                                                <button type="button" class="btn btn-primary btn-xs btn-update-room">Update</button>
                                                <button type="button" class="btn btn-danger btn-xs btn-delete-room">Delete</button>
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

    <div class="modal bs-example-modal-md modal-add-room" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Add Room</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class="form-horizontal form-add-room">
                        {!! csrf_field() !!}
                        <input type="hidden" id="id" name="id" value="0">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Room Type<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="type" id="type" class="form-control">
                                    <option value="Room">Room</option>
                                    <option value="Hall">Hall</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Room Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Room Name...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Room Price <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="price" class="form-control col-md-7 col-xs-12" name="price" placeholder="Room Price...">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-8">
                                <button type="reset" class="btn btn-default btn-close">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-model-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bs-example-modal-sm modal-delete-room" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Delete Room</h4>
                </div>
                <div class="modal-body">
                    <form method="GET" class="form-horizontal form-delete-room">
                        <div class="item form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-danger col-sm-offset-3">Yes</button>
                                <button type="reset" class="btn btn-info btn-close col-sm-offset-1">No</button>
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
        $(".form-new-room").find('input[type=submit]').removeAttr('disabled');

        $('.form-new-room').submit(function(e){
            e.preventDefault();
            $('.modal-add-room').find('#myModalTitle').html("Add Room");
            $('.modal-add-room').find('.form-add-room').attr('action','createRoom');
            $('.modal-add-room').find('#id').val(0);
            $('.modal-add-room').find('#type').val("Room");
            $('.modal-add-room').find('#name').val("");
            $('.modal-add-room').find('#price').val("");
            $('.modal-add-room').show();
        });

        $('.btn-close').click(function(){
            $('.modal-add-room').hide();
            $('.modal-delete-room').hide();
        });

        $('.btn-update-room').click(function(e){
            e.preventDefault();
            $price = Number($(this).parent().parent().find('.room_price').text().replace(/[.,-]/g,"").split('Rp ')[1]);
            $('.modal-add-room').find('#myModalTitle').html("Update Room");
            $('.modal-add-room').find('.form-add-room').attr('action','updateRoom');
            $('.modal-add-room').find('#id').val($(this).parent().parent().find('.room_id').text());
            $('.modal-add-room').find('#type').val($(this).parent().parent().find('.room_type').text());
            $('.modal-add-room').find('#name').val($(this).parent().parent().find('.room_name').text());
            $('.modal-add-room').find('#price').val($price);
            $('.modal-add-room').show();
        });

        $('.btn-delete-room').click(function(e){
            e.preventDefault();
            $link = 'deleteRoom/' + $(this).parent().parent().find('.room_id').text();
            $('.modal-delete-room').find('.form-delete-room').attr('action',$link);
            $('.modal-delete-room').show();
        });
    </script>
@endsection