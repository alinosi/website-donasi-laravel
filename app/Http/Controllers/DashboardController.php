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
    /**
     * Menampilkan halaman dashboard admin.
     */
    public function index()
    {
        // 1. Menghitung Total User
        // Mengambil semua user, bisa ditambahkan where('role', 'user') jika perlu
        $totalUsers = User::count();

        // 2. Menghitung Program Aktif
        // Asumsi: Ada kolom 'is_active' atau status untuk menandakan program aktif
        // Jika tidak ada, cukup gunakan Program::count()
        $totalPrograms = Program::where('is_active', true)->count(); 

        // 3. Menghitung Pemasukan Bulan Ini (Income)
        // Filter berdasarkan status 'success' dan bulan saat ini
        $monthlyIncome = Transaction::where('status', 'success')
                            ->whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->sum('amount');

        // 4. Mengambil 5 Transaksi Terakhir
        // Menggunakan 'with' untuk Eager Loading (mencegah query berulang)
        // Pastikan relasi 'user' dan 'program' sudah ada di Model Transaction
        $latestTransactions = Transaction::with(['user', 'program'])
                                ->latest() // Urutkan dari yang terbaru
                                ->take(5)  // Ambil 5 data saja
                                ->get();

        // 5. Kirim data ke View
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPrograms',
            'monthlyIncome',
            'latestTransactions'
        ));
    }
}