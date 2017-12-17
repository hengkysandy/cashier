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
                                    <input type="submit" value="New Employee" class="btn btn-success" disabled="">
                                </form>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th style="display: none">employee id </th>
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
                                @foreach($employees as $employee)
                                    <tr class="even pointer">
                                        <td style="display: none" class="employee_id">{{ $employee->id }}</td>
                                        <td class="employee_name">{{ $employee->name }}</td>
                                        <td class="employee_email">{{ $employee->email }}</td>
                                        <td class="employee_role">{{ $employee->Role->name }}</td>
                                        <td class="employee_status">{{ $employee->status }}</td>
                                        <td class=" last">
                                            <button type="button" class="btn btn-primary btn-xs btn-update-employee">Update</button>
                                            <button type="button" class="btn btn-danger btn-xs btn-delete-employee">Delete</button>
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

    <div class="modal bs-example-modal-md modal-add-employee" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Add Employee</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class="form-horizontal form-add-employee">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="id">
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

    <div class="modal bs-example-modal-sm modal-delete-employee" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Delete Employee</h4>
                </div>
                <div class="modal-body">
                    <form method="GET" class="form-horizontal form-delete-employee">
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

    @if(count($errors) > 0)
        <div class="checkError"></div>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            if($('.checkError').length!=0){
                new PNotify({
                    title: 'Failed Insert Employee',
                    text: 'Username Already Exists Please Change!!!',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
        });

        $(".form-new-employee").find('input[type=submit]').removeAttr('disabled');

        $('.form-new-employee').submit(function(e){
            e.preventDefault();
            $('.modal-add-employee').find('#myModalTitle').html("Add Employee");
            $('.modal-add-employee').find('.form-add-employee').attr('action','createEmployee');
            $('.modal-add-employee').find('#id').val(0);
            $('.modal-add-employee').find('#name').val("");
            $('.modal-add-employee').find('#email').val("");
            $('.modal-add-employee').show();
        });

        $('.btn-close').click(function(){
            $('.modal-add-employee').hide();
            $('.modal-delete-employee').hide();
        });

        $('.btn-update-employee').click(function(e){
            e.preventDefault();
            $('.modal-add-employee').find('#myModalTitle').html("Update Employee");
            $('.modal-add-employee').find('.form-add-employee').attr('action','updateEmployee');
            $('.modal-add-employee').find('#id').val($(this).parent().parent().find('.employee_id').text());
            $('.modal-add-employee').find('#name').val($(this).parent().parent().find('.employee_name').text());
            $('.modal-add-employee').find('#email').val($(this).parent().parent().find('.employee_email').text());
            $('.modal-add-employee').show();
        });

        $('.btn-delete-employee').click(function(e){
            e.preventDefault();
            $link = 'deleteEmployee/' + $(this).parent().parent().find('.employee_id').text();
            $('.modal-delete-employee').find('.form-delete-employee').attr('action',$link);
            $('.modal-delete-employee').show();
        });
    </script>
@endsection