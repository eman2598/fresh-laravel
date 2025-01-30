<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        return view('admin.points.index');
    }

    public function addPoints(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'points' => 'required|integer|min:1',
            'amount_paid' => 'required|numeric|min:0',
        ]);

        // Add points to the user
        $point = Point::where('user_id', $request->user_id)->first();
        if ($point) {
            $point->increment('points', $request->points);
        } else {
            Point::create([
                'user_id' => $request->user_id,
                'points' => $request->points,
            ]);
        }

        // Store the transaction
        Transaction::create([
            'user_id' => $request->user_id,
            'amount_paid' => $request->amount_paid,
            'points_given' => $request->points,
        ]);

        session()->flash('success_msg', 'Points added and transaction recorded successfully');
        return back();
    }
}
