@extends('layouts.app')
@section('title', 'List Produk')
@section('content')
<x-navbar></x-navbar>

<div class="bg-blue-100 p-4">

  {{-- Notifikasi sukses atau error --}}
  @if (session('success'))
    <div class="mb-4 p-4 bg-blue-100 text-blue-800 rounded-lg shadow">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
      {{ session('error') }}
    </div>
  @endif

  {{-- Tabel List Produk --}}
  <div class="relative overflow-x-auto shadow-md w-full mb-6 rounded-xl">
    <table class="w-full text-sm text-left text-gray-500 rounded-xl">
      <thead class="text-xs text-white uppercase bg-blue-900">
        <tr>
          <th class="px-6 py-3">No</th>
          <th class="px-6 py-3">Nama Produk</th>
          <th class="px-6 py-3">Deskripsi Produk</th>
          <th class="px-6 py-3">Harga Produk</th>
          <th class="px-6 py-3 text-center">Delete</th>
          <th class="px-6 py-3 text-center">Update</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produk as $index => $item)
        <tr class="odd:bg-white even:bg-gray-300">
          <td class="px-6 py-4 font-medium text-gray-900">{{ $index + 1 }}</td>
          <td class="px-6 py-4">{{ $item->nama }}</td>
          <td class="px-6 py-4">{{ $item->deskripsi }}</td>
          <td class="px-6 py-4">Rp.{{ $item->harga }}</td>
          <td class="px-6 py-4 text-center">
            <form action="{{ route('produk.delete', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $item->nama }}?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 p-2 rounded-xl hover:bg-red-700 text-white transition duration-300">Delete</button>
            </form>
          </td>
          <td class="px-6 py-4 text-center">
            <button data-modal-target="modal-update-{{ $item->id }}" data-modal-toggle="modal-update-{{ $item->id }}" 
              class="bg-yellow-500 p-2 rounded-xl hover:bg-yellow-700 text-white transition duration-300">
              Update
            </button>
          </td>
        </tr>

        <!-- Modal Update Produk -->
        <div id="modal-update-{{ $item->id }}" tabindex="-1" aria-hidden="true"
          class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50">
          <div class="relative w-full max-w-lg p-4">
            <div class="bg-white rounded-xl shadow-lg">
              <!-- Header Modal -->
              <div class="flex items-center justify-between p-4 border-b rounded-t bg-blue-100 text-gray-900">
                <h3 class="text-lg font-semibold">Edit Produk</h3>
                <button type="button" data-modal-hide="modal-update-{{ $item->id }}"
                  class="text-gray-500 hover:text-gray-800 rounded-lg text-sm p-1.5">
                  ✕
                </button>
              </div>

              <!-- Body Modal -->
              <div class="p-4">
                <form method="POST" action="{{ route('produk.update', $item->id) }}">
                  @csrf
                  @method('PUT')

                  <div class="mb-4">
                    <label for="nama-{{ $item->id }}" class="block mb-1 text-sm font-medium">Nama Produk</label>
                    <input type="text" id="nama-{{ $item->id }}" name="nama" required
                      value="{{ old('nama', $item->nama) }}"
                      class="w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900">
                  </div>

                  <div class="mb-4">
                    <label for="deskripsi-{{ $item->id }}" class="block mb-1 text-sm font-medium">Deskripsi</label>
                    <textarea id="deskripsi-{{ $item->id }}" name="deskripsi" rows="3"
                      class="w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                  </div>

                  <div class="mb-4">
                    <label for="harga-{{ $item->id }}" class="block mb-1 text-sm font-medium">Harga</label>
                    <input type="number" id="harga-{{ $item->id }}" name="harga" required
                      value="{{ old('harga', $item->harga) }}"
                      class="w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900">
                  </div>

                  <div class="flex justify-end mt-6">
                    <button type="button" data-modal-hide="modal-update-{{ $item->id }}"
                      class="text-gray-600 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg mr-2">Batal</button>
                    <button type="submit"
                      class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Form input produk baru --}}
  <div class="bg-white p-6 rounded-xl">
    <h1 class="text-xl font-semibold mb-4 text-gray-800">Input Produk</h1>

    <form method="POST" action="{{ route('produk.simpan') }}">
      @csrf

      <div>
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
        <input type="text" id="nama" name="nama" required
          value="{{ old('nama') }}"
          class="w-full p-2.5 mb-4 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900">
      </div>

      <div>
        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3"
          class="w-full p-2.5 mb-4 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900">{{ old('deskripsi') }}</textarea>
      </div>

      <div>
        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
        <input type="number" id="harga" name="harga" required
          value="{{ old('harga') }}"
          class="w-full p-2.5 mb-6 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900">
      </div>

      <button type="submit"
        class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
        Simpan
      </button>
    </form>
  </div>
</div>

<x-footer></x-footer>

<!-- Tambahkan JS Modal dari Flowbite (pastikan disertakan di layout atau di sini) -->
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
@endsection