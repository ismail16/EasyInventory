<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;

class InvoiceController extends Controller
{
    public function index()
    {
        return  DefaultResource::collection(Invoice::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(Invoice::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {

        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'invoice_date' => 'required',
            'grand_total_price' => 'required'
        ]);

        $invoice = new Invoice;
        $invoice->invoice_no = 1111;
        $invoice->customer_name = $request->customer_name;
        $invoice->customer_phone = $request->customer_phone;
        $invoice->customer_email = $request->customer_email;
        $invoice->customer_address = $request->customer_address;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->grand_total_price = $request->grand_total_price;
        $invoice->discount = $request->discount;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->due_amount = $request->due_amount;
        $invoice->status = 1;
        $invoice->save();

        $products = $request->products;
        for ($i=0; $i < count($products); $i++) {
            $InvoiceProduct = new InvoiceProduct;
            $InvoiceProduct->invoice_id = $invoice->id;
            $InvoiceProduct->product_name = $products[$i]['product_name'];
            $InvoiceProduct->product_quantity = $products[$i]['product_quantity'];
            $InvoiceProduct->sell_price = $products[$i]['sell_price'];
            $InvoiceProduct->status = 1;
            $InvoiceProduct->save();
        }

        return array('invoice' => $invoice, 'InvoiceProduct' => $InvoiceProduct);
    }


    public function show($id)
    {


        $invoice = Invoice::find($id);
        $InvoiceProduct = InvoiceProduct::where('invoice_id',$id)->get();

        return array('Invoice' => $invoice, 'InvoiceProduct' => $InvoiceProduct);
    }

    public function update(Request $request, $id)
    {
        $req = $request->Invoice;

// $request->validate([
//     'customer_name' => 'required',
//     'customer_phone' => 'required',
//     'invoice_date' => 'required',
//     'grand_total_price' => 'required'
// ]);

        $invoice = Invoice::find($id);

        $invoice->invoice_no = 1111;
        $invoice->customer_name = $req['customer_name'];
        $invoice->customer_phone = $req['customer_phone'];
        $invoice->customer_email = $req['customer_email'];
        $invoice->customer_address = $req['customer_address'];
        $invoice->invoice_date = $req['invoice_date'];
        $invoice->grand_total_price = $req['grand_total_price'];
        $invoice->discount = $req['discount'];
        $invoice->paid_amount = $req['paid_amount'];
        $invoice->due_amount = $req['due_amount'];
        $invoice->status = 1;
        $invoice->save();

        $products = $req['products'];
        if ($products) {
            InvoiceProduct::where('invoice_id',$invoice->id)->delete();
            for ($i=0; $i < count($products); $i++) {
                $InvoiceProduct = new InvoiceProduct;
                $InvoiceProduct->invoice_id = $invoice->id;
                $InvoiceProduct->product_name = $products[$i]['product_name'];
                $InvoiceProduct->product_quantity = $products[$i]['product_quantity'];
                $InvoiceProduct->sell_price = $products[$i]['sell_price'];
                $InvoiceProduct->status = 1;
                $InvoiceProduct->save();
            }
        }

        return array('invoice' => $invoice, 'InvoiceProduct' => $InvoiceProduct);
    }

    public function destroy($id)
    {
        $Invoice = Invoice::find($id);
        $Invoice->delete();
    }

    public function allInvoice()
    {
        return  DefaultResource::collection(Invoice::orderBy('id','asc')->get());
    }

    public function getThisMonthInvoices($month)
    {
        $year = date('Y');
        // $mon = date('m');
        $total_days=cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $month_arr = array();
        for ($m=1; $m <= $total_days; $m++) {
            array_push($month_arr, $year.'-'.$month.'-'.$m);
        }

        $month_val_arr = array();
        for($i= 1; $i<= count($month_arr); $i++) {

            $this_months = Invoice::where('created_at', 'LIKE','%'. $year.'-'.$month.'-'.sprintf("%02d", $i). '%')->select('paid_amount')->get();

            $month_total = 0;
            if (count($this_months) > 0) {
                foreach($this_months as $this_month) {
                    $month_total += $this_month->paid_amount;
                }
            }
            array_push($month_val_arr, $month_total);
        }

        $all_data = DefaultResource::collection(Invoice::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get());

        return array('all_data' => $all_data , 'days'=>$month_val_arr );
    }

    public function getThisYearInvoices($year)
    {
        $yr = date('Y');
        $arrs = array();
        for($i=1; $i<=12; $i++) {
            $month = Invoice::where('created_at', 'LIKE','%'. $yr.'-'.sprintf("%02d", $i).'%')->select('paid_amount')->get();
            $month_total = 0;
            if (count($month) > 0) {
                foreach($month as $total) {
                    $month_total += $total->paid_amount;
                }
            }
            array_push($arrs, $month_total);
        }

        $all_data = DefaultResource::collection(Invoice::orderBy('id','asc')->whereYear('created_at', $yr)->get());
        return array('all_data' => $all_data , 'months'=>$arrs );
    }
}
