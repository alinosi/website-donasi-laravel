<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Program;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class DonaturController extends Controller
{
    public function index(): View
    {
        $donaturs = Donatur::latest()->get();
        return view('donaturs.index', compact('donaturs'));
    }

    public function tampilDonatur(): View
    {
            $donaturs = Transaction::with([
                'user:id,username',
                'program:id,program_name'
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('donaturs.donaturPublic', compact('donaturs'));
    }

    public function create($id): View
    {
        $user = User::findOrFail(Auth::id());
        $program = Program::findOrFail($id);

        return view('donaturs.create', compact('program', 'user'));
    }

    public function donasi(): View
    {
        $donationsdata = Program::where('is_active', 1)->get();
        $donationsRecapt = Transaction::select('program_id', DB::raw('count(*) as total_user'))
                 ->groupBy('program_id')
                 ->get();

        return view('donasi', compact('donationsdata', 'donationsRecapt'));
    }

    public function show(string $id): View
    {
        $donatur = Donatur::findOrFail($id);

        return view('donaturs.show', compact('donatur'));
    }

    public function edit(string $id): View
    {
        $donatur = Donatur::findOrFail($id);

        return view('donaturs.edit', compact('donatur'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama'         => 'required|string|min:1',
            'pesan'        => 'required|string|min:1',
            'total_donasi' => 'required|string|min:1', 
            'tipe_bayar'   => 'required|string|min:1',
        ]);

        $total_donasi = str_replace(['Rp. ', '.', ','], '', $request->total_donasi);

        if (!is_numeric($total_donasi) || $total_donasi < 1) {
            return redirect()->back()->withErrors(['total_donasi' => 'Total donasi harus berupa angka dan minimal 1'])->withInput();
        }

        $donatur = Donatur::findOrFail($id);

        $donatur->update([
            'nama'         => $request->nama,
            'pesan'        => $request->pesan,
            'total_donasi' => $total_donasi,
            'tipe_bayar'   => $request->tipe_bayar,
        ]);

        return redirect()->route('donaturs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    public function destroy($id): RedirectResponse
    {
        $donatur = Donatur::findOrFail($id);

        $donatur->delete();

        return redirect()->route('donaturs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
