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
        $programs = Program::paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function deactivate($id)
    {
        $program = Program::findOrFail($id);
        $program->update([
        'is_active' => 0
        ]);

        return redirect()->back()->with('success', 'Program berhasil dinonaktifkan (Status: Non-Aktif).');
    }

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
            'image'           => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                $file->storeAs('public/program_images', $filename);
                
                $validatedData['image'] = $filename;
            }

            $validatedData['funds_collected'] = 0; 
            $validatedData['is_active'] = 1;      

            Program::create($validatedData);

            return redirect()->route('admin.programs.index')
                             ->with('success', 'Data program berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
