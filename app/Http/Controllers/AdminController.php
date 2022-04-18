<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\keluhan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function indexadmin()
    {
        $user = User::all();
        return view('home', compact('user'));
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('status', 'Data User Berhasil Terhapus');
    }

    public function index()
    {
        $keluhan = keluhan::all();
        return view('admin.keluhan', compact('keluhan'));
    }

    public function edit($id)
    {
        $keluhan = keluhan::where('id', $id)->first();
        return view('admin.keluhanedit', compact('keluhan'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'required|string',
            'status' => 'required',
        ]);

        DB::table('keluhans')->where('id', $id)
        ->update([
            'keluhan' => $request->keluhan,
            'status' => $request->status,
        ]);
        return redirect('admin/keluhan')->with('status', 'Keluhan Berhasil Teredit!');
    }

    public function deletekeluhan($id)
    {
        DB::table('keluhans')->where('id', $id)->delete();
        return redirect()->back()->with('status', 'Keluhan Berhasil Terhapus');
    }
}
