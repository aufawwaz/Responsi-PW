@extends('layout')

@section('content')
<div class="bg-white min-h-screen">
    <div class="container mx-auto px-4 py-32 max-w-2xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <span class="text-2xl">✏️</span> Edit Genre Komik
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-5">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('komik.updateGenre', $komik->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium text-gray-700">Judul Baru</label>
                <input type="text" name="genre" value="{{ old('genre', $komik->genre) }}"
                       class="form-input w-full py-2 px-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Update
                </button>
                <a href="{{ route('index') }}"
                   class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg shadow hover:bg-gray-400 transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
<div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Genre Komik</h2>
    <form action="{{ route('komik.updateGenre', $komik->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Genre</label>
            <input type="text" name="genre" value="{{ $komik->genre }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
    </form>
</div>
@endsection