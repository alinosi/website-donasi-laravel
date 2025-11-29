<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Program;
use App\Models\Donatur;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }
}
