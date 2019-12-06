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
    }


    public function show($id)
    {
        $expense = Expense::find($id);
        $expense_items = ExpenseItem::where('expense_id',$id)->get();
        return array('expense' => $expense, 'expense_items' => $expense_items);
    }

    public function update(Request $request, $id)
    {
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
    }

    public function destroy($id)
    {
        Expense::find($id)->delete();
        ExpenseItem::where('expense_id', $id)->delete();
    }
}
