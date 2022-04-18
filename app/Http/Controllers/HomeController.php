<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        $keluhan = Keluhan::where('user_id','=', Auth::user()->id)->get();
        return view('user.keluhan', compact('keluhan'));
    }

    public function add()
    {
        return view('user.keluhanadd');
=======
        $data = array('title' => 'Home');
        return view('homepage.index', $data);
>>>>>>> c1e7f82294dd2d121c1ffab284f8ad7502a5c9d6
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'keluhan' => 'required|string',
        ]);

        DB::table('keluhans')
        ->insert([
            'user_id' => Auth::user()->id,
            'keluhan' => $request->keluhan,
            'status' => 'Pending',
        ]);
        
        return redirect('home')->with('status', 'Keluhan Berhasil Ditambah!');
    }

    public function edit($id)
    {
        $keluhan = keluhan::where('id', $id)->first();
        return view('user.keluhanedit', compact('keluhan'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'required|string',
        ]);

        DB::table('keluhans')->where('id', $id)
        ->update([
            'keluhan' => $request->keluhan,
        ]);
        return redirect('home')->with('status', 'Keluhan Berhasil Teredit!');
    }

    public function delete($id)
    {
        DB::table('keluhans')->where('id', $id)->delete();
        return redirect()->back()->with('status', 'Keluhan Berhasil Terhapus');
    }


}
