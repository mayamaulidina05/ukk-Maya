<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Petugas;
use carbon\Carbon;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function viewTambahTanggapanPetugas($id_pengaduan)
    {
    	$data['pengaduan'] = Pengaduan::where('id_pengaduan',$id_pengaduan)->first();
    	return view('petugas.tambahTanggapan',$data);
    }

    public function viewEditTanggapanPetugas($id_pengaduan)
    {
        $data['tanggapan'] = Tanggapan::where('id_pengaduan',$id_pengaduan)->first();
        return view('petugas.editTanggapan',$data);
    }

    public function viewTambahTanggapanAdmin($id_pengaduan)
    {
        $data['pengaduan'] = Pengaduan::where('id_pengaduan',$id_pengaduan)->first();
        return view('admin.tambahTanggapan',$data);
    }

    public function viewEditTanggapanAdmin($id_pengaduan)
    {
        $data['tanggapan'] = Tanggapan::where('id_pengaduan',$id_pengaduan)->first();
        return view('admin.editTanggapan',$data);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stores(Request $request, $id)
    {
        // dd($request->input);
        $this->validate($request,[
    		'tanggapan' => 'required|min:1'
    	]);

    	$input = $request->all();
        
    	$ids = auth()->user()->id;
        
        $date = carbon::now();
        $statusc = Tanggapan::create([
            'tgl_tanggapan' => $date,
            'tanggapan' => $input['tanggapan'],
            'id_petugas' => $ids,
            'id_pengaduan' => $id,
        ]);

        if ($statusc) {
            $upStat = Pengaduan::where('id', $id)->first();
            $statusd = $upStat->update([
                'status' => 'selesai',
            ]);
            
            if ($statusd) {
                return redirect()->route('Masyarakat.index');
            } else {
                if (Session::get('level') == 'admin') {
                    return redirect('admin/tanggapan')->with('error');                    
                }elseif(Session::get('level') == 'petugas'){
                    return redirect('petugas/tanggapan')->with('error');
                }else{
                    return redirect('/');
                }                               
            }
            
        } else {
            if (Session::get('type') == 'admin') {
                return redirect('admin/tanggapan')->with('error');                    
            }elseif(Session::get('level') == 'petugas'){
                return redirect('petugas/tanggapan')->with('error');
            }else{
                return redirect('/');
            }            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        $this->validate($request,[
            'tanggapan' => 'required|min:1'
        ]);

        $input = $request->all();

        $id = auth()->user()->id;
		$petugas = Petugas::where('id_user',$id)->first();	
		$id_petugas = $petugas->id_petugas;

        $date = carbon::now;

        $data = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();        

        $data->tgl_tanggapan = $date;
        $data->tanggapan = $input['tanggapan'];
        $data->id_petugas = $id_petugas;

        $statusc = $data->update();
            
        if ($statusc) {
            if (Session::get('level') == 'admin') {
                return redirect('admin/tanggapan')->with('success');                    
            }elseif(Session::get('level') == 'petugas'){
                return redirect('petugas/tanggapan')->with('success');
            }else{
                return redirect('/');
            }            
        } else {
            if (Session::get('level') == 'admin') {
                return redirect('admin/tanggapan')->with('error');                    
            }elseif(Session::get('level') == 'petugas'){
                return redirect('petugas/tanggapan')->with('error');
            }else{
                return redirect('/');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        $data = Tanggapan::where('id_tanggapan',$id_tanggapan)->first();        
        $id = $data->id_pengaduan;
        $statusc = $data->delete();
            
        if ($statusc) {

        	$pengadu = Pengaduan::where('id_pengaduan',$id)->first();
        	$pengadu->status = '0';

        	$saveAs = $pengadu->update();

        	if ($saveAs) {
                if (Session::get('level') == 'admin') {
                    return redirect('admin/tanggapan')->with('success');                    
                }elseif(Session::get('level') == 'petugas'){
                    return redirect('petugas/tanggapan')->with('success');
                }else{
                    return redirect('/');
                }      		
        	}else{
                if (Session::get('level') == 'admin') {
                    return redirect('admin/tanggapan')->with('error');                    
                }elseif(Session::get('level') == 'petugas'){
                    return redirect('petugas/tanggapan')->with('error');
                }else{
                    return redirect('/');
                }
        	}

        } else {
            if (Session::get('level') == 'admin') {
                return redirect('admin/tanggapan')->with('error');                    
            }elseif(Session::get('level') == 'petugas'){
                return redirect('petugas/tanggapan')->with('error');
            }else{
                return redirect('/');
            }
        }        
    }
}
