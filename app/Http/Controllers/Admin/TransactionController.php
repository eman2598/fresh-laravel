<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();

        return view('admin.transactions.index', compact('transactions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount_paid' => 'required|numeric',
            'points_given' => 'required|integer',
        ]);

        $transaction = new Transaction();
        $transaction->user_id = $request->user_id;
        $transaction->amount_paid = $request->amount_paid;
        $transaction->points_given = $request->points_given;
        $transaction->save();

        Point::updateOrCreate(
            ['user_id' => $request->user_id],
            ['points' => \Illuminate\Support\Facades\DB::raw('points + ' . $request->points_given)]
        );

        session()->flash('success_msg', 'Transaction successfully stored!');

        return redirect()->route('admin.transactions.index');
    }
}
