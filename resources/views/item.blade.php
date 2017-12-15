@extends('layout.master')

@section('title','Item - Cashier')

@section('content')
    @include('layout.sidebar')

    @include('layout.navigation')

    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Item</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Item</h2>
                        @if( session()->get('userSession')->role_id == 1 )
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <form class="form-new-item">
                                    <input type="submit" value="New Item" class="btn btn-success" disabled="">
                                </form>
                            </li>
                        </ul>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th style="display: none">item id </th>
                                        <th class="column-title">Item Name </th>
                                        <th class="column-title">Item Price </th>
                                        <th class="column-title">Item Stock </th>
                                        <th class="column-title">Item Status </th>
                                        @if( session()->get('userSession')->role_id == 1 )
                                        <th class="column-title no-link last">
                                            <span class="nobr">Action</span>
                                        </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                        <tr class="even pointer">
                                            <td style="display: none" class="item_id">{{ $item->id }}</td>
                                            <td class="item_name">{{ $item->name }}</td>
                                            <td class="item_price">Rp. {{ number_format($item->price,0,'','.') }},- </td>
                                            <td class="item_stock">{{ $item->stock }}</td>
                                            <td class="item_status">{{ $item->status }}</td>
                                            @if( session()->get('userSession')->role_id == 1 )
                                                <td class=" last">
                                                <button type="button" class="btn btn-primary btn-xs btn-update-item">Update</button>
                                                <button type="button" class="btn btn-danger btn-xs btn-delete-item">Delete</button>
                                            </td>
                                            @endif
                                            
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

    <div class="modal bs-example-modal-md modal-add-item" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Add Item</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class="form-horizontal form-add-item">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="id">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Item Name...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Item Price <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="price" class="form-control col-md-7 col-xs-12" name="price" placeholder="Item Price...">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Item Stock<span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="stock" class="form-control col-md-7 col-xs-12" name="stock" placeholder="Item Stock...">
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

    <div class="modal bs-example-modal-sm modal-delete-item" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalTitle">Delete Item</h4>
                </div>
                <div class="modal-body">
                    <form method="GET" class="form-horizontal form-delete-item">
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
        $(".form-new-item").find('input[type=submit]').removeAttr('disabled');

        $('.form-new-item').submit(function(e){
            e.preventDefault();
            $('.modal-add-item').find('#myModalTitle').html("Add Item");
            $('.modal-add-item').find('.form-add-item').attr('action','createItem');
            $('.modal-add-item').find('#id').val(0);
            $('.modal-add-item').find('#name').val("");
            $('.modal-add-item').find('#price').val("");
            $('.modal-add-item').find('#stock').val("");
            $('.modal-add-item').show();
        });

        $('.btn-close').click(function(){
            $('.modal-add-item').hide();
            $('.modal-delete-item').hide();
        });

        $('.btn-update-item').click(function(e){
            e.preventDefault();
            $price = Number($(this).parent().parent().find('.item_price').text().replace(/[.,-]/g,"").split('Rp ')[1]);
            $('.modal-add-item').find('#myModalTitle').html("Update Item");
            $('.modal-add-item').find('.form-add-item').attr('action','updateItem');
            $('.modal-add-item').find('#id').val($(this).parent().parent().find('.item_id').text());
            $('.modal-add-item').find('#name').val($(this).parent().parent().find('.item_name').text());
            $('.modal-add-item').find('#stock').val(Number($(this).parent().parent().find('.item_stock').text()));
            $('.modal-add-item').find('#price').val($price);
            $('.modal-add-item').show();
        });

        $('.btn-delete-item').click(function(e){
            e.preventDefault();
            $link = 'deleteItem/' + $(this).parent().parent().find('.item_id').text();
            $('.modal-delete-item').find('.form-delete-item').attr('action',$link);
            $('.modal-delete-item').show();
        });
    </script>
@endsection