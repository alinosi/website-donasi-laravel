<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Program;
use App\Models\Donatur;
use App\Models\Transaction;

class ProgramController extends Controller
{
    public function index() {
        // $programs = Program::where('is_active', 1)->paginate(10);
        $programs = Program::paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function deactivate($id)
    {
    // Cari data berdasarkan ID
        $program = Program::findOrFail($id);

    // Ubah status is_active menjadi 0 (Non-Aktif)
        $program->update([
        'is_active' => 0
        ]);

    // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Program berhasil dinonaktifkan (Status: Non-Aktif).');
    }

    // public function store(Request $request)
    // {
    //     // 1. Validasi Input
    //     $validatedData = $request->validate([
    //         'program_name'    => 'required|string|max:255',
    //         'descriptions'    => 'required|string',
    //         'target_funds'    => 'required|integer|min:0',
    //         'funds_collected' => 'nullable|integer|min:0', 
    //         'image'           => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    //         'is_active'       => 'boolean',
    //     ]);

    //     try {
    //         if ($request->hasFile('image')) {
    //             $file = $request->file('image');
    //             $filename = time() . '_' . $file->getClientOriginalName();
    //             $file->storeAs('public/program_images', $filename);

    //             $validatedData['image'] = $filename;
    //         }

    //         $validatedData['is_active'] = $request->input('is_active', 1);
    //         $validatedData['funds_collected'] = $request->input('funds_collected', 0);
    //         $program = Program::create($validatedData);

    //         return response()->json([
    //             'message' => 'Program berhasil dibuat!',
    //             'data'    => $program
    //         ], 201);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Terjadi kesalahan saat menyimpan data',
    //             'error'   => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'program_name'    => 'required|string|max:255',
            'descriptions'    => 'required|string',
            'target_funds'    => 'required|numeric|min:0',
            'image'           => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Simpan ke folder: storage/app/public/program_images
                $file->storeAs('public/program_images', $filename);
                
                // Simpan nama file ke array data
                $validatedData['image'] = $filename;
            }

            // 3. Set Default Value
            $validatedData['funds_collected'] = 0; // Default 0 saat baru buat
            $validatedData['is_active'] = 1;       // Default 1 (Aktif)

            // 4. Simpan ke Database
            Program::create($validatedData);

            // 5. Redirect ke halaman index dengan pesan sukses
            return redirect()->route('admin.programs.index')
                             ->with('success', 'Data program berhasil ditambahkan!');

        } catch (\Exception $e) {
            // Jika ada error server, kembalikan ke form input
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
