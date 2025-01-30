<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Reward;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $transactions = Transaction::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    if ($user->role == 'user') {
        $totalPoints = Point::where('user_id', $user->id)->sum('points');
        $rank = $this->getRank($totalPoints);
        $rewards = Reward::all();
        
        return view('dashboard', compact('totalPoints', 'rank', 'rewards', 'transactions'));
    }

    // Admin Data
    $totalCustomers = User::count();
    $totalEarnedPoints = Point::sum('points');
    $totalRedeemedPoints = Transaction::sum('points_given');
    $totalPurchasedPoints = Transaction::sum('amount_paid');

    return view('dashboard', compact('totalCustomers', 'totalEarnedPoints', 'totalRedeemedPoints', 'totalPurchasedPoints', 'transactions'));
}


    private function getRank($points)
    {
        if ($points >= 1000) {
            return 'Gold';
        } elseif ($points >= 500) {
            return 'Silver';
        } elseif ($points >= 100) {
            return 'Bronze';
        } else {
            return 'Newbie';
        }
    }

    public function redeem(Request $request)
    {
        $reward = Reward::find($request->reward_id);
        $userPoints = Point::where('user_id', Auth::id())->sum('points');

        if ($userPoints >= $reward->points_required) {
            Point::where('user_id', Auth::id())->decrement('points', $reward->points_required);

            session()->flash('success_msg', "You have successfully redeemed the {$reward->name}!");
            return back();
        } else {
            session()->flash('error_msg', 'You do not have enough points to redeem this reward.');
            return back();
        }
    }

}
