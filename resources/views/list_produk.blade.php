<!-- Link ke Flowbite -->
<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

<!-- Navbar -->
 @include('components.menu')

<form method="POST" action="{{ route('produk.simpan') }}" class="max-w-screen-md mx-auto mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-8">
    @csrf
    <h1 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Input Produk</h1>
    <div class="mb-5">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
        <input type="text" id="nama" name="nama" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
        dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Masukkan nama produk" required />
    </div>

    <div class="mb-5">
        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
        dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Tulis deskripsi produk..." required></textarea>
    </div>

    <div class="mb-5">
        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
        <input type="number" id="harga" name="harga" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Contoh: 15000" required />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
    font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
</form>




<div class="relative overflow-x-auto mt-10 shadow-md sm:rounded-lg mx-auto max-w-screen-md">
    <table class="w-full text-xs text-left text-gray-700 dark:text-gray-300">
        <thead class="text-xs text-white uppercase bg-blue-700 dark:bg-gray-800">
            <tr>
                <th scope="col" class="px-4 py-2">No</th>
                <th scope="col" class="px-4 py-2">Nama Produk</th>
                <th scope="col" class="px-4 py-2">Deskripsi</th>
                <th scope="col" class="px-4 py-2">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nama as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $item }}</td>
                <td class="px-4 py-2">{{ $desc[$index] }}</td>
                <td class="px-4 py-2">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Footer -->
 @include('components.footer')