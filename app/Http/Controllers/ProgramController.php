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
}
