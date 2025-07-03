@extends('layout')

@section('content')
<div class="container mx-auto py-8 px-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <h2 class="text-3xl font-bold flex items-center gap-2">📚 Katalog Komik</h2>
        @auth
        <a href="{{ route('komik.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Tambah Komik</a>
        @endauth
    </div>

    <form method="GET" action="{{ route('index') }}" class="mb-8">
        <div class="flex flex-col md:flex-row gap-4 items-center bg-gray-50 p-4 rounded-lg shadow-sm">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Cari judul komik..."
                class="border border-gray-300 rounded px-3 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-200"
            >
            <select
                name="genre"
                class="border border-gray-300 rounded px-3 py-2 w-full md:w-48 focus:outline-none focus:ring-2 focus:ring-blue-200"
            >
                <option value="">Semua Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                @endforeach
            </select>
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full md:w-auto"
            >Cari</button>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($komikList as $komik)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition card-manga overflow-hidden flex flex-col">
            <a href="{{ route('komik.show', $komik->id) }}">
                <img src="{{ asset('assets/covers/' . $komik->cover) }}" alt="{{ $komik->title }}" class="w-full h-64 object-cover">
            </a>
            <div class="p-4 flex-1 flex flex-col">
                <h5 class="text-lg font-semibold mb-1">
                    <a href="{{ route('komik.show', $komik->id) }}" class="hover:underline">{{ $komik->title }}</a>
                </h5>
                <p class="text-gray-500 mb-3">{{ $komik->genre }}</p>
                {{-- <div class="mt-auto flex flex-wrap gap-2 justify-around">
                    <a href="{{ route('komik.editName', $komik->id) }}" class="btn-small bg-yellow-100 text-yellow-800 px-3 py-1 rounded text-xs hover:bg-yellow-200">Edit Nama</a>
                    <a href="{{ route('komik.editGenre', $komik->id) }}" class="btn-small bg-green-100 text-green-800 px-3 py-1 rounded text-xs hover:bg-green-200">Edit Genre</a>
                    <a href="{{ route('komik.editCover', $komik->id) }}" class="btn-small bg-blue-100 text-blue-800 px-3 py-1 rounded text-xs hover:bg-blue-200">Edit Cover</a>
                    <form action="{{ route('komik.destroy', $komik->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-small bg-red-100 text-red-800 px-3 py-1 rounded text-xs hover:bg-red-200">Hapus</button>
                    </form>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection