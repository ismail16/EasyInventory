<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseItem;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;

class ExpenseController extends Controller
{
   public function index()
    {
        return  DefaultResource::collection(Expense::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(Expense::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'supplier_id' => 'required',
        //     'warehouse_id' => 'required',
        //     'invoice_date' => 'required',
        //     'grand_total_price' => 'required'
        // ]);

        $supplier_invoice = new Expense;
        $supplier_invoice->invoice_no = 1111;
        $supplier_invoice->supplier_id = $request->supplier_id;
        $supplier_invoice->warehouse_id = $request->warehouse_id;
        $supplier_invoice->invoice_date = $request->invoice_date;
        $supplier_invoice->grand_total_price = $request->grand_total_price;
        $supplier_invoice->paid_amount = $request->paid_amount;
        $supplier_invoice->due_amount = $request->due_amount;
        $supplier_invoice->discount = $request->discount;
        $supplier_invoice->status = 1;

        $supplier_invoice->image = $name ;


        $supplier_invoice->save();



        $products = $request->products;
        for ($i=0; $i < count($products); $i++) { 
            $ExpenseProduct = new ExpenseProduct;
            $ExpenseProduct->supplier_invoice_id = $supplier_invoice->id;
            $ExpenseProduct->product_name = $products[$i]['product_name'];
            $ExpenseProduct->product_quantity = $products[$i]['product_quantity'];
            $ExpenseProduct->supplier_price = $products[$i]['supplier_price'];
            $ExpenseProduct->status = 1;
            $ExpenseProduct->save();
        }

        // return $ExpenseProduct;

        return array('supplier_invoice' => $supplier_invoice, 'ExpenseProduct' => $ExpenseProduct);


    }


    public function show($id)
    {


        $supplier_invoice = Expense::find($id);
        $ExpenseProduct = ExpenseProduct::where('supplier_invoice_id',$id)->get();

        return array('Expense' => $supplier_invoice, 'ExpenseProduct' => $ExpenseProduct);
    }

    public function update(Request $request, $id)
    {
        $req = $request->Expense;
        $supplier_invoice = Expense::find($id);
        $supplier_invoice->invoice_no = 1111;
        $supplier_invoice->supplier_id = $req['supplier_id'];
        $supplier_invoice->warehouse_id = $req['warehouse_id'];
        $supplier_invoice->invoice_date = $req['invoice_date'];
        $supplier_invoice->grand_total_price = $req['grand_total_price'];
        $supplier_invoice->paid_amount = $req['paid_amount'];
        $supplier_invoice->due_amount = $req['due_amount'];
        $supplier_invoice->discount = $req['discount'];
        $supplier_invoice->status = 1;

        $supplier_invoice->save();
        

        $products = $req['products'];
        if ($products) {
            ExpenseProduct::where('supplier_invoice_id', $supplier_invoice->id)->delete();
            for ($i=0; $i < count($products); $i++) { 
                $ExpenseProduct = new ExpenseProduct;
                $ExpenseProduct->supplier_invoice_id = $supplier_invoice->id;
                $ExpenseProduct->product_name = $products[$i]['product_name'];
                $ExpenseProduct->product_quantity = $products[$i]['product_quantity'];
                $ExpenseProduct->supplier_price = $products[$i]['supplier_price'];
                $ExpenseProduct->status = 1;
                $ExpenseProduct->save();
            }
        }
        
        return array('supplier_invoice' => $supplier_invoice, 'ExpenseProduct' => $ExpenseProduct);
    }

    public function destroy($id)
    {
        $Expense = Expense::find($id);
        $Expense->delete();
    }
}
