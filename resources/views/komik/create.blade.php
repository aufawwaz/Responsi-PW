@extends('layout')

@section('content')
<div class="bg-white min-h-screen">
    <div class="container mx-auto px-15 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <span class="text-3xl">➕</span> Tambah Komik Baru
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

        <form action="{{ route('komik.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-3 font-medium text-gray-700">Judul Komik</label>
                <input type="text" name="title"
                       class="form-input w-full py-2 px-3 border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label class="block mb-3 font-medium text-gray-700">Genre</label>
                <input type="text" name="genre"
                       class="form-input w-full py-2 px-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label class="block mb-3 font-medium text-gray-700">Upload Cover</label>
                <input type="file" name="cover"
                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                       accept="image/*">
            </div>

            <div>
                <label class="block mb-3 font-medium text-gray-700">Sinopsis</label>
                <textarea name="sinopsis"
                    class="form-input w-full py-2 px-3 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    rows="4"></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Simpan
                </button>
                <a href="{{ route('index') }}"
                   class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg shadow hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
