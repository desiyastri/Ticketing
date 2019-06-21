<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pegawai_Model;

class PegawaiController extends Controller
{
    public function pegawai()
    {
    	$result = Pegawai_Model::disp_pegawai();

    	return view('admin/pegawai', ['tb_pegawai'=>$result]);
    }

    public function add_Pegawai(Request $request)
	{
		
		Pegawai_Model::add_pegawai($request);

		return redirect('/admin/pegawai');
	}

    public function delete_Pegawai($id)
    {
        Pegawai_Model::delete_pegawai($id);

        return redirect('/admin/pegawai');
    }

    public function edit_Pegawai($id)
    {
        $tb_pegawai=Pegawai_Model::edit_pegawai($id);

        return view('/admin/edit_Pegawai', ['tb_pegawai'=>$tb_pegawai]);
    }

    public function  update_Pegawai(Request $request)
    {
        Pegawai_Model::update_pegawai($request);

        return redirect('admin/pegawai');
    }
}
