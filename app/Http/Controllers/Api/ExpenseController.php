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

<<<<<<< HEAD
        $expense = new Expense;
        $expense->expense_title = $request->expense_title;
        $expense->expense_date = $request->expense_date;
        $expense->expense_detail = $request->expense_detail;
        $expense->expense_total_amount = $request->expense_total_amount;
        $expense->expense_paid_amount = $request->expense_paid_amount;
        $expense->expense_due = $request->expense_due;
        $expense->status = 1;
        $expense->save();

        $expenses = $request->expenses;
        for ($i=0; $i < count($expenses); $i++) { 
            $expense_items = new ExpenseItem;
            $expense_items->expense_id = $expense->id;
            $expense_items->expense_purpose = $expenses[$i]['expense_purpose'];
            $expense_items->expense_quantity = $expenses[$i]['expense_quantity'];
            $expense_items->expense_amount = $expenses[$i]['expense_amount'];
            $expense_items->status = 1;
            $expense_items->save();
        }
        return array('expense' => $expense, 'expense_items' => $expense_items);
=======
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


>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
    }


    public function show($id)
    {


<<<<<<< HEAD
        $expense = Expense::find($id);
        $expense_items = ExpenseItem::where('expense_id',$id)->get();

        return array('expense' => $expense, 'expense_items' => $expense_items);
=======
        $supplier_invoice = Expense::find($id);
        $ExpenseProduct = ExpenseProduct::where('supplier_invoice_id',$id)->get();

        return array('Expense' => $supplier_invoice, 'ExpenseProduct' => $ExpenseProduct);
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $req = $request->expenses;


        // return $req;

        $expense = Expense::find($id);
        $expense->expense_title = $req['expense_title'];
        $expense->expense_date = $req['expense_date'];
        $expense->expense_detail = $req['expense_detail'];
        $expense->expense_total_amount = $req['expense_total_amount'];
        $expense->expense_paid_amount = $req['expense_paid_amount'];
        $expense->expense_due = $req['expense_due'];
        $expense->status = 1;
        $expense->save();

        $expenses = $req['expense_items'];
        if ($expenses) {
            ExpenseItem::where('expense_id', $expense->id)->delete();
            for ($i=0; $i < count($expenses); $i++) { 
                $expense_items = new ExpenseItem;
                $expense_items->expense_id = $expense->id;
                $expense_items->expense_purpose = $expenses[$i]['expense_purpose'];
                $expense_items->expense_quantity = $expenses[$i]['expense_quantity'];
                $expense_items->expense_amount = $expenses[$i]['expense_amount'];
                $expense_items->status = 1;
                $expense_items->save();
            }
        }
        return array('expense' => $expense, 'expense_items' => $expense_items);
=======
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
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
    }

    public function destroy($id)
    {
<<<<<<< HEAD
        Expense::find($id)->delete();
        ExpenseItem::where('expense_id', $id)->delete();
=======
        $Expense = Expense::find($id);
        $Expense->delete();
>>>>>>> de387a977b131a423ebcd20dceee7510d4390888
    }
}
