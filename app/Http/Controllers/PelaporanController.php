<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\DetailKorban;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 3) {
            $pelaporans = Pelaporan::where('user_id', Auth::user()->id)->get();

        return view('pelaporan.index', compact('pelaporans'));
        }else{
            $pelaporans = Pelaporan::all();

            return view('pelaporan.index', compact('pelaporans'));
        }
    }

    public function search(Request $request)
    {
        if (Auth::user()->role_id == 3) {
            $pelaporans = Pelaporan::where('user_id', Auth::user()->id)->where('waktu', '>=', $request->start)->where('waktu', '<=', $request->akhir)->get();

        return view('pelaporan.index', compact('pelaporans'));
        }else{
            $pelaporans = Pelaporan::where('waktu', '>=', $request->start)->where('waktu', '<=', $request->akhir)->get();

            return view('pelaporan.index', compact('pelaporans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bencanas = Bencana::all();

        return view('pelaporan.create', compact('bencanas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelaporan::create($request->all());

        return redirect()->route('pelaporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        $details = DetailKorban::where('pelaporan_id', $id)->get();

        return view('pelaporan.show', compact('pelaporan', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $bencanas = Bencana::all();

        return view('pelaporan.edit', compact('pelaporan', 'bencanas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pelaporan::find($id)->update($request->all());

        return redirect()->route('pelaporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelaporan::find($id)->delete();

        return redirect()->back();
    }

    public function validasi(Request $request, $id)
    {
        Pelaporan::find($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }

    public function detail(Request $request, $id)
    {
        DetailKorban::create($request->all());
        $id;

        return redirect()->back();
    }
}
