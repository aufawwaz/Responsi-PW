@extends('layout')

@section('content')
<div class="container mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">📋 Tabel Komik</h2>
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Cover</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Genre</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($komikList as $i => $komik)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $i+1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ asset('assets/covers/' . $komik->cover) }}" alt="{{ $komik->title }}" class="w-16 h-20 object-cover rounded shadow">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $komik->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $komik->genre }}</td>
                </tr>
                @endforeach
                @if($komikList->isEmpty())
                <tr>
                    <td colspan="5" class="text-center py-8 text-gray-400">Belum ada data komik.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection