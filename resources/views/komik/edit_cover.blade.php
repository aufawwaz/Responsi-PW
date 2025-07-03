@extends('layout')

@section('content')
<div>
    <div class="container mx-auto px-4 py-32 max-w-2xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            <span class="text-2xl">✏️</span> Edit Cover Komik
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

        <form action="{{ route('komik.updateCover', $komik->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium text-gray-700">Upload Cover Baru</label>
                <input type="file" name="cover"
                       class="block w-full text-sm text-gray-700 shadow file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                       accept="image/*" required>
            </div>

            <div class="mb-4">
                <img src="{{ asset('assets/covers/' . $komik->cover) }}" alt="Cover" class="w-32 h-44 object-cover rounded">
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
@endsection