<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\pmodel;
use App\Http\Requests\prequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class pcontroller extends Controller
{
    public function index()
    {
        // $user = User::where(['admin' => 1])->first();



        // dd($user);
        $data = pmodel::all();
        return view('pegawai')->with('pegawai', $data);
    }
    public function create()
    {

        // dd($user);

        return view('create-pegawai');
    }
    public function store(prequest $request)
    {
        $uploadedFile = $request->file('cover_img')->store('public/covers');
        $uploadedFile = $request->file('filepdf')->store('public/Filepdf');
        $model = new pmodel;
        $model->nip = $request->post("nip");
        $model->nama = $request->post("nama");
        $model->ttglahir = $request->post("ttglahir");
        $model->agama = $request->post("agama");
        $model->jkelamin = $request->post("jkelamin");
        $model->cover_img = $uploadedFile;
        $model->filepdf = $uploadedFile;

        $model->save();

        return redirect('pegawai');
    }
    public function show($id)
    {

        $pegawai = pmodel::findOrFail($id);
        return view('view-pegawai')->with('pegawai', $pegawai);
    }
    public function edit($id)
    {
        $pegawai = pmodel::findOrFail($id);
        return view('edit-pegawai')->with('pegawai', $pegawai);
    }
    public function update(prequest $request, $id)
    {
        $pegawai = pmodel::findOrFail($id);
        $pegawai->nip = $request->post("nip");
        $pegawai->nama = $request->post("nama");
        $pegawai->ttglahir = $request->post("ttglahir");
        $pegawai->agama = $request->post("agama");
        $pegawai->jkelamin = $request->post("jkelamin");
        if (!is_null($request->file('cover_img'))) {
            $uploadedFile = $request->file('cover_img')->store('public/covers');
            $pegawai->cover_img = $uploadedFile;
        }
        if (!is_null($request->file('filepdf'))) {
            $uploadedFile = $request->file('filepdf')->store('public/Filepdf');
            $pegawai->filepdf = $uploadedFile;
        }
        $pegawai->save();

        return redirect('pegawai');
    }
    public function destroy($id)
    {
        $pegawai = pmodel::findOrFail($id);
        $pegawai->delete();
        return redirect('pegawai');
    }

    public function paginationtest()
    {
        $data = pmodel::paginate(5);
        //$pegawai = DB::table('pegawai')->paginate(5);
        //dd($data);
        return view('index', ['tbpegawai' => $data]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = DB::table('tbpegawai')
            ->where('nip', 'LIKE', '%' . $search . '%')
            ->orwhere('nama', 'LIKE', '%' . $search . '%')
            ->orwhere('ttglahir', 'LIKE', '%' . $search . '%')
            ->orwhere('agama', 'LIKE', '%' . $search . '%')
            ->orwhere('jkelamin', 'LIKE', '%' . $search . '%')
            ->get();
        return view('pegawai')->with('pegawai', $data);
    }
}
