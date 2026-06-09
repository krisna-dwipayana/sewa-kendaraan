<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user kecuali admin yang sedang login (opsional)
        // atau ambil semua user diurutkan dari yang terbaru daftar
        $users = User::latest()->get();
        
        return view('admin.user.index', compact('users'));
    }
}