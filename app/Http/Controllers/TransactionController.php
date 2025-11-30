<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|integer',
            'pay_type'   => 'nullable|string',
            'amount'     => 'required|string|min:1',
        ]);

        $amount = str_replace(['Rp. ', '.', ','], '', $request->amount);

        if (!is_numeric($amount) || $amount < 1) {
            return redirect()->back()->withErrors(['total_donasi' => 'Total donasi harus berupa angka dan minimal 1'])->withInput();
        }

        Transaction::create([
            'user_id'    => Auth::id(),        
            'program_id' => $request->program_id,
            'pay_type'   => $request->pay_type,
            'status'     => 'success',
            'amount'     => $amount,
        ]);

        return redirect()->route('donaturs.index')->with(['success' => 'Data Berhasil Dibuat!']);
    }
    
}
