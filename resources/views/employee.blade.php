@extends('layout.master')

@section('title','Employee - Cashier')

@section('content')
    @include('layout.sidebar')

    @include('layout.navigation')

    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Employee</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Employee...">
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
                        <h2>Show Employee</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <form class="form-new-employee">
                                    <input type="submit" value="New Employee" class="btn btn-success">
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
                                    <th class="column-title">Employee Name </th>
                                    <th class="column-title">Employee Email </th>
                                    <th class="column-title">Employee Role </th>
                                    <th class="column-title">Employee Status </th>
                                    <th class="column-title no-link last">
                                        <span class="nobr">Action</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="even pointer">
                                    <td class=" ">Hengky Tebe</td>
                                    <td class=" ">htebe@gmail.com</td>
                                    <td class=" ">Admin</td>
                                    <td class=" ">Active</td>
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

    <div class="modal bs-example-modal-md modal-add-employee" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Add Employee</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('createEmployee')}}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Employee Role<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="role" class="form-control">
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input required="" type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Employee Name...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input required="" type="password" id="password" class="form-control col-md-7 col-xs-12" name="password" placeholder="Password...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Employee Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input required="" type="email" id="email" class="form-control col-md-7 col-xs-12" name="email" placeholder="Employee Email...">
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
        $('.form-new-employee').submit(function(e){
            e.preventDefault();
            $('.modal-add-employee').show();
        });


        $('.btn-close').click(function(){
            $('.modal-add-employee').hide();
        });
    </script>
@endsection