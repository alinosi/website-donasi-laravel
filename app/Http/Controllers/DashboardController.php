<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Program;
use App\Models\Donatur;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPrograms = Program::where('is_active', true)->count(); 
        $monthlyIncome = Transaction::where('status', 'success')
                            ->whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->sum('amount');
        $latestTransactions = Transaction::with(['user', 'program'])
                                ->latest() 
                                ->take(5)  
                                ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPrograms',
            'monthlyIncome',
            'latestTransactions'
        ));
    }
}