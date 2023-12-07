<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function kirimTanggapan(Request $request)
    {
        $tanggapan = [
            'tanggapan' => $request->input('tanggapan'),
            'pengaduan_id' => $request->input('id_pengaduan'),
            'users_id' => Auth::id(),
        ];
        $newTanggapan = Tanggapan::create($tanggapan);
        return redirect()->back()->with('success');
    }

    public function dataTanggapan()
    {
        $id_pengaduan = request()->input('id_pengaduan');
        $tanggapan = Tanggapan::where('pengaduan_id', $id_pengaduan)->get();

        return $tanggapan;
    }
}
