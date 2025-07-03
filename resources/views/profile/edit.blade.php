@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow mt-10">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Profil</h2>
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-white text-gray-900">
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border border-gray-300 rounded px-3 py-2 bg-white text-gray-900">
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-gray-700">Avatar</label>
            <input type="file" name="cover"
                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                       accept="image/*">
            @if($user->avatar)
                <img src="{{ asset('assets/avatars/' . $user->avatar) }}" class="w-16 h-16 rounded-full mt-5 border border-gray-300">
            @endif
        </div>
        <a href="{{ route('index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Kembali</a>
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 ml-2 rounded-lg hover:bg-blue-700 transition">Simpan
        </button>
    </form>
</div>
@endsection