<?php

namespace App\Http\Controllers;
//import Model "Soal
use App\Models\Soal;
use Illuminate\Http\Request;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//return type View
use Illuminate\View\View;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class SoalController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get soals
        $soals = Soal::latest()->paginate(5);
        //render view with posts
        return view('soals.index', compact('soals'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('soals.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_soal'     => 'required|min:5'
        ]);
        //create post
        Soal::create([
            'nama_soal'   => $request->nama_soal
        ]);

        //redirect to index
        return redirect()->route('soals.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $soals = Soal::findOrFail($id);

        //render view with post
        return view('soals.show', compact('soals'));
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $soals = Soal::findOrFail($id);

        //render view with post
        return view('soals.edit', compact('soals'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_soal'     => 'required|min:5'
        ]);

        //get post by ID
        $soal = Soal::findOrFail($id);



        //update post without image
        $soal->update([
            'nama_soal'     => $request->nama_soal,
        ]);
        //redirect to index
        return redirect()->route('soals.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $soal = Soal::findOrFail($id);


        //delete post
        $soal->delete();

        //redirect to index
        return redirect()->route('soals.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
