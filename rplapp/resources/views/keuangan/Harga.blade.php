<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-green-700 py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="flex items-center space-x-10 text-teal">
            </div>
            <div class="text-white">
                <div class="mb-1 text-right">Nama Pengguna</div>
                <div class="text-xs text-right">Keuangan</div>
            </div>
        </div>
    </nav>
    <!-- bagian button tambah ama undu -->
    <div class="flex justify-between mx-auto px-4 py-4">
        <div>
            <h6 class="flex items-center">
                Pengeluaran Bulanan
            </h6>
        </div>
        <div class="flex items-center space-x-2">
            <button class="bg-green-500 text-white px-4 py-2 rounded-full flex items-center" onclick="togglePopup('add')">
                <img src="{{asset('images/add.png')}}" alt="Tambah" class="w-4 h-4 mr-2">
                Tambah
            </button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-full flex items-center" onclick="togglePopup('edit')">
                <img src="{{asset('images/download.png')}}" alt="Unduh" class="w-4 h-4 mr-2">
                Unduh
            </button>
        </div>
    </div>
    <!-- bagian body data card -->
    @if ($datas->count()>0)
        @foreach ($datas as $d)
        <div class="my-5 mx-5 border-rounded-full">
            <div class="bg-gray-300">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-xl"> {{$d->nama}}</div>
                        <div class="text-sm">Rp. {{$d->harga_beli}}</div>
                    </div>
                    <div class="ml-auto flex space-x-10 px-3">
                        <a href="{{route('showHargaModal',['id'=>$d->id])}}" class="bg-white text-black hover:bg-blue-600 hover:text-white font-bold py-2 px-10 rounded text-lg mt-3 mb-3">Edit</a>
                        <a href="{{route('hapusHarga',['id'=>$d->id])}}" class="bg-red-500 text-black hover:bg-red-800 hover:text-white font-bold py-2 px-10 rounded text-lg mt-3 mb-3">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif

<!-- Popup -->
@if ($modal==true)
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md bg-gray-200">
        <h2 class="text-2xl mb-4 font-bold" id="popup-title"></h2>
        <form action="{{route('submitHarga')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$barang->id}}">
            <div class="mb-4">
                <label for="nama-barang" class="block mb-2">Nama Barang</label>
                <input type="text" name="nama" value="{{$barang->nama}}" id="nama-barang" class="w-full border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="harga-barang" class="block mb-2">Harga Barang</label>
                <input type="text" name="harga" value="{{$barang->harga_beli}}" id="harga-barang" class="w-full border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="markup" class="block mb-2">Markup</label>
                <input type="text" id="markup" class="w-full border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{route('harga')}}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2" >Cancel</a>
            </div>
        </form>
    </div>
</div>
@endif

<script>
    function togglePopup(mode) {
        const popup = document.querySelector('.fixed');
        const popupTitle = document.querySelector('#popup-title');
        const namaBarangInput = document.querySelector('#nama-barang');
        const hargaBarangInput = document.querySelector('#harga-barang');
        const markupInput = document.querySelector('#markup');

        if (mode === 'edit') {
            popupTitle.textContent = 'Edit Barang';
            namaBarangInput.value = 'Nama Barang';
            hargaBarangInput.value = 'Rp. harga barang';
            markupInput.value = 'Persentase Harga';
        } else if (mode === 'add') {
            popupTitle.textContent = 'Tambah Barang';
            namaBarangInput.value = '';
            hargaBarangInput.value = '';
            markupInput.value = '';
        } else {
            popup.classList.add('hidden');
            return;
        }

        popup.classList.remove('hidden');
    }
</script>

</body>
</html>
