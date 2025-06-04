@extends('layout.app')
@section('title', 'List Produk')

@section('content')
<x-menu />

<div class="bg-blue-100 p-4">
  {{-- Notifikasi sukses atau error --}}
  @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
      {{ session('error') }}
    </div>
  @endif

  {{-- Tabel List Produk --}}
  <div class="relative overflow-x-auto mt-10 shadow-md sm:rounded-lg mx-auto max-w-screen-md">
    <table class="w-full text-xs text-left text-gray-700 dark:text-gray-300">
        <thead class="text-xs text-white uppercase bg-blue-700 dark:bg-gray-800">
            <tr>
                <th scope="col" class="px-4 py-2">No</th>
                <th scope="col" class="px-4 py-2">Nama Produk</th>
                <th scope="col" class="px-4 py-2">Deskripsi</th>
                <th scope="col" class="px-4 py-2">Harga</th>
                <th scope="col" class="px-4 py-2">Delete</th>
                <th scope="col" class="px-4 py-2">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $item->nama }}</td>
                <td class="px-4 py-2">{{ $item->deskripsi }}</td>
                <td class="px-4 py-2">Rp {{ $item->harga }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('produk.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $item->nama }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white px-3 py-1 rounded-lg">Delete</button>
                    </form>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('produk.edit', $item->id) }}" class="bg-yellow-400 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>

  {{-- Form Input / Edit Produk --}}
  <form method="POST" action="{{ isset($produkEdit) ? route('produk.update', $produkEdit->id) : route('produk.simpan') }}" 
        class="max-w-screen-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-8">
      @csrf
      @if(isset($produkEdit))
          @method('PUT')
      @endif

      <h1 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
        {{ isset($produkEdit) ? 'Edit Produk' : 'Input Produk' }}
      </h1>

      <div class="mb-5">
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
          <input type="text" id="nama" name="nama"
              value="{{ old('nama', isset($produkEdit) ? $produkEdit->nama : '') }}"
              class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
              focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
              dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
              placeholder="Masukkan nama produk" required />
      </div>

      <div class="mb-5">
          <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" rows="3"
              class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
              dark:shadow-xs-light"
              placeholder="Tulis deskripsi produk..." required>{{ old('deskripsi', isset($produkEdit) ? $produkEdit->deskripsi : '') }}</textarea>
      </div>

      <div class="mb-5">
          <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
          <input type="number" id="harga" name="harga"
              value="{{ old('harga', isset($produkEdit) ? $produkEdit->harga : '') }}"
              class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
              dark:shadow-xs-light"
              placeholder="Contoh: 15000" required />
      </div>

      <button type="submit"
          class="text-white {{ isset($produkEdit) ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-blue-700 hover:bg-blue-800' }} 
          focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 
          text-center dark:focus:ring-blue-800">
          {{ isset($produkEdit) ? 'Update Produk' : 'Simpan' }}
      </button>
  </form>
</div>

<x-footer></x-footer>
@endsection
