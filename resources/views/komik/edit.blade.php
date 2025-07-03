@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8 mt-10">
    <h2 class="text-2xl font-bold mb-6">Edit Komik</h2>
    <form method="POST" action="{{ route('komik.update', $komik->id) }}" enctype="multipart/form-data" class="mb-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title', $komik->title) }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-white text-gray-900">
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Genre</label>
            <input type="text" name="genre" value="{{ old('genre', $komik->genre) }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-white text-gray-900">
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Avatar</label>
            <input type="file" name="cover"
                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                       accept="image/*">
            @if($komik->cover)
                <img src="{{ asset('assets/covers/' . $komik->cover) }}" class="w-24 h-32 rounded mt-3 border border-gray-300">
            @endif
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Sinopsis</label>
            <textarea name="sinopsis" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 bg-white text-gray-900">{{ old('sinopsis', $komik->sinopsis) }}</textarea>
        </div>
        <a href="{{ route('komik.show', $komik->id) }}" class="mt-2 bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Batal</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white ml-2 px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>
@endsection