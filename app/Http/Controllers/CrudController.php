<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    //
    public function lihatdata()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                $siswas = Siswa::oldest()->get();
                return view('read', compact('siswas'), ['title' => 'Read Data']);
            } else {
                return redirect('/user');
            }
        } else {
            return redirect('login');
        }
    }

    public function prosestambah(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                $validatedData =
                    $request->validate([
                        'nama' => 'required',
                        'alamat' => 'required',
                        'kelas' => 'required'
                    ], [
                        'nama.required' => 'harus mengisi nama',
                        'alamat.required' => 'harus mengisi alamat',
                        'kelas.required' => 'harus mengisi kelas'
                    ]);

                $validatedData['nama'] = $validatedData['nama'];
                $validatedData['alamat'] = $validatedData['alamat'];
                $validatedData['kelas'] = $validatedData['kelas'];
                $siswas = Siswa::create($validatedData);

                if ($siswas) {
                    return redirect('read')->with('success', 'Data berhasil diinput');
                } else {
                    return redirect('read')->with('fail', 'Data gagal diinput');
                }
            }
        } else {
            return redirect('login');
        }
    }


    public function editdata($id)
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                $siswas = Siswa::findOrFail($id);
                return view('edit', compact('siswas'), ['title' => 'Edit Data']);
            } else {
                return redirect('/user');
            }
        } else {
            return redirect('login');
        }
    }

    public function prosesedit(Request $request, $id)
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                $siswas = Siswa::find($id);
                $validatedData =
                    $request->validate([
                        'nama' => 'required',
                        'alamat' => 'required',
                        'kelas' => 'required'
                    ], [
                        'nama.required' => 'harus mengisi nama',
                        'alamat.required' => 'harus mengisi alamat',
                        'kelas.required' => 'harus mengisi kelas'
                    ]);

                $validatedData['nama'] = $validatedData['nama'];
                $validatedData['alamat'] = $validatedData['alamat'];
                $validatedData['kelas'] = $validatedData['kelas'];
                $siswas = Siswa::create($validatedData);

                if ($siswas) {
                    return redirect('read')->with('success', 'Data berhasil diubah');
                } else {
                    return redirect('read')->with('fail', 'Data gagal diubah');
                }
            }
        } else {
            return redirect('login');
        }
    }

    public function hapusdata($id)
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                $siswas = Siswa::findOrFail($id);
                $siswas->delete();

                if ($siswas) {
                    return redirect('read')->with('success', 'Data berhasil dihapus');
                } else {
                    return redirect('read')->with('fail', 'Data gagal dihapus');
                }
            }
        } else {
            return redirect('login');
        }
    }
}
