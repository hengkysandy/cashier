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

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Report...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show Report</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <span class="form-control toggleSelect"><i class="fa fa-filter"></i></span>
                                </li>
                                <li class="showSelect">
                                    <select class="form-control col-md-6 filter-report">
                                        <option value="Day">Day</option>
                                        <option value="Month">Month</option>
                                        <option value="Year">Year</option>
                                    </select>
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
                                        <th class="column-title">Employee Name </th>
                                        <th class="column-title">Customer Name </th>
                                        <th class="column-title">Customer Phone </th>
                                        <th class="column-title">Booking Hour </th>
                                        <th class="column-title">Booking Date </th>
                                        <th class="column-title no-link last">
                                            <span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="even pointer">
                                        <td class=" ">Room 1</td>
                                        <td class=" ">Rp. 10,000,000,- </td>
                                        <td class=" ">Hengky Tebe</td>
                                        <td class=" ">Andy</td>
                                        <td class=" ">081208120812</td>
                                        <td class=" ">2</td>
                                        <td class=" ">On Going</td>
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
    </div>
@endsection

@section('script')
    <script>
        $('.showSelect').hide();

        $('.toggleSelect').click(function(){
           $('.showSelect').toggle();
        });
    </script>
@endsection