<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        return  DefaultResource::collection(Loan::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(Loan::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'loaner_name' => 'required'
        ]);

        $Loan = new Loan;
        $Loan->loaner_name = $request->loaner_name;
        $Loan->loaner_mobile = $request->loaner_mobile;
        $Loan->loaner_email = $request->loaner_email;
        $Loan->loaner_address = $request->loaner_address;
        $Loan->loan_amount = $request->loan_amount;
        $Loan->loan_taken_date = $request->loan_taken_date;
        $Loan->loan_end_date = $request->loan_end_date;
        $Loan->loan_detail = $request->loan_detail;
        $Loan->status = 1;
        $Loan->save();
        return $Loan;
    }

    public function show($id)
    {
        return new DefaultResource(Loan::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Loan_name' => 'required'
        ]);

        $Loan = Loan::find($id);
        $Loan->Loan_name = $request->Loan_name;
        $Loan->save();
        return $Loan;
    }

    public function destroy($id)
    {
        $Loan = Loan::find($id);
        $Loan->delete();
    }
}
