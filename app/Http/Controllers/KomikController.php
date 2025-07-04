<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komik;

class KomikController extends Controller
{
    public function index(Request $request)
    {
        $komikList = Komik::query()
            ->when($request->q, fn($q) => $q->where('title', 'like', '%' . $request->q . '%'))
            ->when($request->genre, fn($q) => $q->where('genre', $request->genre))
            ->paginate(9);

        $genres = Komik::distinct()->pluck('genre')->filter();

        return view('index', compact('komikList', 'genres'));
    }

    public function create()
    {
        return view('komik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'sinopsis' => 'nullable|string',
        ]);

        $coverName = time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('assets/covers'), $coverName);

        Komik::create([
            'title' => $validated['title'],
            'genre' => $validated['genre'],
            'cover' => $coverName,
            'sinopsis' => $validated['sinopsis'],
        ]);

        return redirect()->route('komik.index')->with('success', 'Komik berhasil ditambahkan!');
    }

    public function table()
    {
        $komikList = Komik::orderBy('title')->get();
        return view('komik.table', compact('komikList'));
    }
    public function show($id)
    {
        $komik = Komik::findOrFail($id);
        return view('komik.show', compact('komik'));
    }

    public function update(Request $request, $id)
    {
        $komik = Komik::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sinopsis' => 'nullable|string',
        ]);

        $komik->title = $validated['title'];
        $komik->genre = $validated['genre'];
        $komik->sinopsis = $validated['sinopsis'];

        if ($request->hasFile('cover')) {
            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/covers'), $coverName);
            $komik->cover = $coverName;
        }

        $komik->save();

        return redirect()->route('komik.show', $komik->id)->with('success', 'Komik berhasil diperbarui!');
    }
    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        return view('komik.edit', compact('komik'));
    }

    public function destroy($id)
    {
        $komik = Komik::findOrFail($id);
        if (file_exists(public_path('assets/covers/' . $komik->cover))) {
            unlink(public_path('assets/covers/' . $komik->cover));
        }
        $komik->delete();
        return redirect()->route('komik.index')->with('success', 'Komik dihapus!');
    }
}
