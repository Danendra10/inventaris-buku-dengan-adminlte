<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;

class BookController extends Controller
{
    public function index()
    {
        $books = books::all();
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no' => 'required'
        ]);
        $array = $request->only([
            'name', 'no'
        ]);
        $books = books::create($array);
        return redirect()->route('books.index')
            ->with('success_message', 'Berhasil menambah buku baru');
    }

    public function edit($id)
    {
        $books = books::find($id);
        if (!$books) return redirect()->route('books.index')
            ->with('error_message', 'books dengan id' . $id . ' tidak ditemukan');
        return view('books.edit', [
            'books' => $books
        ]);
    }

    public function destroy($id)
    {
        $books = books::find($id);
        if(!$books) return redirect()->route('books.index');
        else $books->delete();
        return redirect()->route('books.index')->with('success_message', 'Berhasil menghapus books');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required' . $id,
        ]);
        $books = books::find($id);
        $books->name = $request->name;
        $books->no = $request->no;
        $books->save();
        return redirect()->route('books.index')
            ->with('success_message', 'Berhasil mengubah books');
    }
    
    // public function destroy(Request $request, $id)
    // {
    //     $books = books::find($id);
    //     if ($id == $request->books()->id) return redirect()->route('books.index')
    //         ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
    //     if ($books) $books->delete();
    //     return redirect()->route('books.index')
    //         ->with('success_message', 'Berhasil menghapus books');
    // }
}
