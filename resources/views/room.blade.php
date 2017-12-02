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

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Room...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
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
                                    <input type="submit" value="New Room" class="btn btn-success">
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
                                <tr class="even pointer">
                                    <td class=" ">Room 1</td>
                                    <td class=" ">Rp. 10,000,000,- </td>
                                    <td class=" ">Room</td>
                                    <td class=" ">Book</td>
                                    <td class=" last">
                                        <button type="button" class="btn btn-primary btn-xs">Update</button>
                                        <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                    </td>
                                </tr>
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
                    <form action="{{url('createRoom')}}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Room Type<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="type" class="form-control">
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
        $('.form-new-room').submit(function(e){
            e.preventDefault();
            $('.modal-add-room').show();
        });


        $('.btn-close').click(function(){
            $('.modal-add-room').hide();
        });
    </script>
@endsection