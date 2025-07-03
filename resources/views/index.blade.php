@extends('layout')

@section('content')
<div class="container mx-auto py-8 px-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <h2 class="text-3xl font-bold flex items-center gap-2">📚 Katalog Komik</h2>
        <a href="{{ route('komik.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Tambah Komik</a>
    </div>

    <form method="GET" action="{{ route('index') }}" class="mb-6 flex flex-col md:flex-row gap-4 items-center">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul komik..." class="border rounded px-3 py-2 w-full md:w-64">
        <select name="genre" class="border rounded px-3 py-2 w-full md:w-48">
            <option value="">Semua Genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Cari</button>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($komikList as $komik)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition card-manga overflow-hidden flex flex-col">
            <img src="{{ asset('assets/covers/' . $komik->cover) }}" alt="{{ $komik->title }}" class="w-full h-64 object-cover">
            <div class="p-4 flex-1 flex flex-col">
                <h5 class="text-lg font-semibold mb-1 dark:text-white">{{ $komik->title }}</h5>
                <p class="text-gray-500 dark:text-gray-300 mb-3">{{ $komik->genre }}</p>
                <div class="mt-auto flex flex-wrap gap-2 justify-around">
                    <a href="{{ route('komik.editName', $komik->id) }}" class="btn-small bg-yellow-100 dark:bg-yellow-700 text-yellow-800 dark:text-yellow-100 px-3 py-1 rounded text-xs hover:bg-yellow-200 dark:hover:bg-yellow-800">Edit Nama</a>
                    <a href="{{ route('komik.editGenre', $komik->id) }}" class="btn-small bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-100 px-3 py-1 rounded text-xs hover:bg-green-200 dark:hover:bg-green-800">Edit Genre</a>
                    <a href="{{ route('komik.editCover', $komik->id) }}" class="btn-small bg-blue-100 dark:bg-blue-700 text-blue-800 dark:text-blue-100 px-3 py-1 rounded text-xs hover:bg-blue-200 dark:hover:bg-blue-800">Edit Cover</a>
                    <form action="{{ route('komik.destroy', $komik->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-small bg-red-100 dark:bg-red-700 text-red-800 dark:text-red-100 px-3 py-1 rounded text-xs hover:bg-red-200 dark:hover:bg-red-800">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $komikList->withQueryString()->links() }}
    </div>
</div>
@endsection