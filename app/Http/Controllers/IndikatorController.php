<?php

namespace App\Http\Controllers;
//import Model "Indikator"
use App\Models\Indikator;
//return type View
use Illuminate\View\View;
use Illuminate\Http\Request;

//import Model "Soal
use App\Models\Soal;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use IntlChar;

class IndikatorController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get soals
        $indikators = Indikator::latest()->paginate(5);
        $soals = Soal::latest();
        //render view with posts
        return view('indikators.index', compact('indikators', 'soals'));
    }


    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('indikators.create');
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
            'nama_indikator'     => 'required|min:5'
        ]);
        //create post
        Indikator::create([
            'nama_indikator'   => $request->nama_indikator,
            'id_soal' => 0
        ]);

        //redirect to index
        return redirect()->route('indikators.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $indikators = Indikator::findOrFail($id);

        //render view with post
        return view('indikators.show', compact('indikators'));
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
        $indikators = Indikator::findOrFail($id);

        //render view with post
        return view('indikators.edit', compact('indikators'));
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
            'nama_indikator'     => 'required|min:5'
        ]);

        //get post by ID
        $indikators = Indikator::findOrFail($id);



        //update post without image
        $indikators->update([
            'nama_indikator'     => $request->nama_indikator,
            'id_soal' => 0
        ]);
        //redirect to index
        return redirect()->route('indikators.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $indikators = Indikator::findOrFail($id);


        //delete post
        $indikators->delete();

        //redirect to index
        return redirect()->route('indikators.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
