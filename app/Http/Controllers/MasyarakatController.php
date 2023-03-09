<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\User;
use App\Models\Pengaduan;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user());
        if (auth()->user()->type > 0) {
            $pengaduan = Pengaduan::all();
            return view('Masyarakat.index', compact('pengaduan'));   
        }else{

        
        $id = auth()->user()->email;
		$masyarakat = Masyarakat::where('username',$id)->first();
		$name = Masyarakat::where('username',$id)->first();
        $nama = $name->nama;
		$nik = $masyarakat->nik;	
        if (auth()->user()->type == 0) {
            $data['pengaduan'] = Pengaduan::where([
                ['nik',$nik],
                ['status',"!=","selesai"]
                ])->get();
            }else{
                $data['pengaduan'] = Pengaduan::all();
            }
        return view('Masyarakat.index',$data, compact('nama'));  
    }           		
    }
    public function registerUser(Request $request)
        {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'password' => Hash::make($request->password),
            ]);
            
            if ($data) {
                $id = User::where('email', $request->email)->first();
                 Masyarakat::create([
                    'id_user'=> $id->id,
                    'nama' => $request->name,
                    'nik' => $request->nik,
                    'username' => $request->email,
                    'password' => Hash::make($request->password),
                    'telp' => $request->telp, 
                ]);
                
                return redirect()->route('login');
               
            }else{
                return back();            
            }
        }

    public function updateStatus($id)
    {
        $masyarakat = Pengaduan::find($id);

        if ($masyarakat->status == 0) {
            $masyarakat->update([
                'status' => 'proses',
            ]);
            return redirect()->back();
        }elseif ($masyarakat->status == 'proses') {
            $masyarakat->update([
                'status' => 'selesai',
            ]);
            return redirect()->back();
        }else{
            return redirect()->back()->with('error', 'proses sudah diselesaikan');
        }
    }
    public function viewTanggapan()
    {
        $id = auth()->user()->id;
        $masyarakat = Masyarakat::where('id_user',$id)->first();    
        $nik = $masyarakat->nik;   

        $data['tanggapan'] = Pengaduan::where([
            ['nik',$nik],
            ['status',"selesai"]
        ])->get();

        return view('Masyarakat.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat)
    {
        return view('Masyarakat.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        //
    }
}



// namespace App\Http\Controllers;

// use App\Models\Masyarakat;
// use Illuminate\Http\Request;

// class MasyarakatController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
        
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Masyarakat  $masyarakat
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Masyarakat $masyarakat)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Masyarakat  $masyarakat
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Masyarakat $masyarakat)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Masyarakat  $masyarakat
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Masyarakat $masyarakat)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Masyarakat  $masyarakat
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Masyarakat $masyarakat)
//     {
//         //
//     }
// } -->
