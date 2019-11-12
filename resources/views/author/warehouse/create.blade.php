@extends('admin.layouts.master')
@section('title', 'Add New Warehouse')


@section('content')
    <div class="content-wrapper">
        <section class="content-header pb-2 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 pr-0">
                        <a href="" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> @yield('title')
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">General Elements</h3>--}}
{{--                            </div>--}}
                            <div class="card-body">
                                <form class="form-vertical" id="addexpinvoice" name="addexpinvoice" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group row">
                                                    <label for="expense_type_id" class="col-sm-3 form-control-label">Select Supplier <i class="text-danger">*</i></label>
                                                    <div class="col-sm-8">
                                                        <select id="supplier_id" name="supplier_id" class="form-control" data-plugin="select2" required="">
                                                            <option value="">Select Supplier</option>
                                                            <option value="70">UQWELI Packaging</option>
                                                            <option value="54">UNILEVER</option>
                                                            <option value="56">test suppliers</option>
                                                            <option value="61">NIKE</option>
                                                            <option value="58">PT Kadjoe Indonesia</option>
                                                            <option value="59">Shaikot Ikbal</option>
                                                            <option value="63">MVI solutions</option>
                                                            <option value="76">mohit</option>
                                                            <option value="77">ismail</option>
                                                            <option value="69">nawjesh</option>
                                                            <option value="75">test</option>

                                                        </select>
                                                        <input id="auth_id" type="hidden" name="auth_id" value="1">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="warehouse_id" class="col-sm-3 form-control-label">Warehouse </label>
                                                    <div class="col-sm-8">
                                                        <select id="warehouse_id" name="warehouse_id" class="form-control" data-plugin="select2">
                                                            <option value="">Select Warehouse</option>
                                                            <option value="139">saltlake</option>
                                                            <option value="138">SaltLake</option>
                                                            <option value="137">Ovo je novo skladiste</option>
                                                            <option value="134">ssdsd</option>
                                                            <option value="135">zxcv</option>
                                                            <option value="136">gvbvnh</option>
                                                            <option value="133">adddd</option>
                                                            <option value="132">Kijitonyama - Dar es Salaam</option>
                                                            <option value="131">Posta - Dar es Salaam</option>
                                                            <option value="129">industrial area</option>
                                                            <option value="127">chennai warehouse </option>
                                                            <option value="126">Bob123</option>
                                                            <option value="101">Warehouse - 1</option>
                                                            <option value="100">Warehouse - 2</option>
                                                            <option value="130">Delhi</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="datepicker_invoice_exp" class="col-sm-2 col-form-label">Date <i class="text-danger">*</i></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" autocomplete="off" id="datepicker_invoice_exp" name="datepicker_invoice_exp" placeholder="yyyy-mm-dd" required="">
                                                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-8">
                                                        <input name="userfile" id="userfile" type="file">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="table-responsive" style="margin-top: 10px">
                                            <table class="table table-bordered table-hover" id="normalinvoice">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Item Information <i class="text-danger">*</i></th>
                                                    <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                                    <th class="text-center">Rate <i class="text-danger">*</i></th>
                                                    <th class="text-center">Total</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="add_row_to_invoice">
                                                <tr>
                                                    <td style="width: 320px">
                                                        <input name="product_name[]" class="form-control productSelection" placeholder="Item Name" required="" id="product_name" autocomplete="off" tabindex="1" type="text">

                                                    </td>
                                                    <td style="width: 320px">
                                                        <input name="product_quantity[]" autocomplete="off" class="total_qty_1 form-control" id="total_qty_1" onkeyup="quantity_calculate(1);" required="" onchange="quantity_calculate(1);" placeholder="0" tabindex="2" type="text">
                                                    </td>
                                                    <td>
                                                        <input name="product_rate[]" autocomplete="off" value="" id="item_price_1" placeholder="0.00" class="item_price_1 price_item form-control" tabindex="3" onkeyup="quantity_calculate(1);" required="" onchange="quantity_calculate(1);" type="text">
                                                    </td>

                                                    <td>
                                                        <input class="total_price form-control" name="total_price[]" id="total_price_1" placeholder="0.00" value="" tabindex="-1" readonly="" type="text">
                                                    </td>

                                                    <td>
                                                        <button style="text-align: right;" class="btn btn-danger" type="button" onclick="deleteRow(this)" value="Delete" tabindex="4">Delete</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>

                                                <tr>
                                                    <td colspan="3" style="text-align:right;"><b>Grand Total:</b></td>
                                                    <td class="text-right">
                                                        <input id="grandTotal" class="form-control" name="grand_total_price" value="0.00" tabindex="-1" readonly="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <input id="add-invoice-item" class="btn btn-info" name="add-invoice-item" onclick="add_row('add_row_to_invoice');" value="Add New Item" tabindex="5" type="button">
                                                    </td>
                                                    <td style="text-align:right;" colspan="2"><b>Paid Amount:</b></td>
                                                    <td class="text-right">
                                                        <input id="paidAmount" autocomplete="off" class="form-control" name="paid_amount" onkeyup="invoice_paidamount();" value="" placeholder="0.00" tabindex="6" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <input id="add-invoice" class="btn btn-success" name="add-invoice" value="Submit" tabindex="8" type="submit">
                                                        <input id="full_paid_tab" class="btn btn-warning" name="" onclick="full_paid();" value="Full Paid" tabindex="7" type="button">
                                                    </td>
                                                    <td style="text-align:right;" colspan="2"><b>Due:</b></td>
                                                    <td class="text-right">
                                                        <input id="dueAmmount" class="form-control" name="due_amount" value="0.00" readonly="" type="text">
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection