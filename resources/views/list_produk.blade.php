
<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-black dark:bg-gray-900">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Nama Produk</th>
                <th scope="col" class="px-6 py-3">Deskripsi Produk</th>
                <th scope="col" class="px-6 py-3">Harga Produk</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($nama as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4">{{ $item }}</td>
                <td class="px-6 py-4">{{ $desc[$index] }}</td>
                <td class="px-6 py-4">{{ $harga[$index] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
