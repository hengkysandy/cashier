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
                        <h2>Report Item</h2>
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
                                    <th class="column-title">Item Sale </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr class="even pointer">
                                        <td style="display: none">{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp. {{ number_format($item->price,0,'','.') }},- </td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->transactiondetail->sum('quantity') }}</td>
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
@endsection