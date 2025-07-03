@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8 mt-10">
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex flex-col md:flex-row gap-8 mb-8">
        <img src="{{ asset('assets/covers/' . $komik->cover) }}" alt="{{ $komik->title }}" class="w-60 h-80 object-cover rounded-lg border">
        <div>
            <h2 class="text-3xl font-bold mb-2">{{ $komik->title }}</h2>
            <div class="mb-4 text-blue-600 font-semibold">{{ $komik->genre }}</div>
            <div class="mb-4 text-gray-700">
                <strong>Sinopsis:</strong>
                <div class="mt-1 whitespace-pre-line">{{ $komik->sinopsis }}</div>
            </div>
            <div class="flex flex-wrap gap-2 mt-4">
                <a href="{{ route('index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Kembali</a>
                @auth
                    <a href="{{ route('komik.edit', $komik->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit Komik</a>
                    <form method="POST" action="{{ route('komik.destroy', $komik->id) }}" onsubmit="return confirm('Yakin ingin menghapus komik ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">Hapus Komik</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection