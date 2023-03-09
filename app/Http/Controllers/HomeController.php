<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //     $m = Masyarakat::where('username', auth()->user()->email)->first();
        // }
        //  dd(auth()->user()->email);
        $pengaduan = Pengaduan::all();
        return view('home', compact('pengaduan'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $user = User::count();
        $pengaduan = Pengaduan::count();
        $tanggapan = Tanggapan::count();
        $belum_ditanggapi = Pengaduan::where('status', '0')->count();
        return view('adminHome', compact('user', 'pengaduan', 'tanggapan', 'belum_ditanggapi'));
    }

    public function store(Type $var = null)
    {
        # code...
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        $user = User::count();
        $pengaduan = Pengaduan::count();
        $tanggapan = Tanggapan::count();
        $belum_ditanggapi = Pengaduan::where('status', '0')->count();
        return view('managerHome', compact('user', 'pengaduan', 'tanggapan', 'belum_ditanggapi'));
    }
}
