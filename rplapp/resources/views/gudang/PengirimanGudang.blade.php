<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengiriman Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- bagian navbar -->
    <nav class="bg-yellow-400 py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
          <div class="flex items-center space-x-10 text-teal">
            <a href="{{route('pesanan_gudang')}}" class="text-white text-xl transition duration-300 ease-in-out font-bold">Pesanan</a>
            <a href="{{route('pengiriman_gudang')}}" class="text-white text-xl font-bold">Pengiriman</a>
          </div>
            <div class="text-white">
                <div class="mb-1 text-right">Nama Pengguna</div>
                <div class="text-xs text-right">Gudang</div>
            </div>
        </div>
    </nav>    
    <div class="text-xl text-black-100 px-4 py-2"> List Pengiriman </div>
    <!-- bagian card -->
    @if ($listPesanan->count()>0)
        @foreach ($listPesanan as $p)
        <div class="container mx-auto py-8">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex">
                    <div class="w-1/2 bg-gray-100 py-8 px-6">
                        <h2 class="text-xl font-bold mb-2">Status Barang : {{$p->status}}</h2>
                        <p class="text-sm">Informasi Barang</p>
                        <p class="text-sm">Nama Barang : {{$p->nama_barang}}</p>
                        <p class="text-sm">Jumlah Barang : {{$p->stok}}</p>
                    </div>
                    <div class="w-1/2 bg-gray-200 py-8 px-6">
                        <h2 class="text-xl font-bold mb-2">Data Pembeli</h2>
                        <p class="text-sm">Nama Pembeli : {{$p->nama_pembeli}}</p>
                        <p class="text-sm">Nomor Pembeli : {{$p->no_hp_pembeli}}</p>
                        <p class="text-sm">Email Pembeli : {{$p->kontak_pembeli}}</p>
                        <p class="text-sm">Alamat Pembeli : {{$p->alamat_pembeli}}</p>
                    </div>
                </div>
                <div >
                    <form class="flex justify-end px-6 py-4" action="{{route('validate_pengiriman')}}" method="POST">
                        @csrf
                        <input type="hidden" name="idPesanan" value="{{$p->id}}">
                        <button name="status" class="bg-red-500 text-white px-4 py-2 rounded-full flex items-center mr-2" value="0">
                            Batal
                        </button>
                        <button name="status" class="bg-green-500 text-white px-4 py-2 rounded-full flex items-center" value="1">
                            Selesai
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</body>
</html>
