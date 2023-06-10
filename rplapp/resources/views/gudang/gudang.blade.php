<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-yellow-400 py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
          <div class="flex items-center space-x-10 text-teal">
            <a href="{{ route('pesanan_gudang') }}" class="text-white text-xl transition duration-300 ease-in-out font-bold">Pesanan</a>
            <a href="{{ route('pengiriman_gudang')}}" class="text-white text-xl font-bold">Pengiriman</a>
          </div>
            <div class="text-white">
                <div class="mb-1 text-right">Nama Pengguna</div>
                <div class="text-xs text-right">Gudang</div>
            </div>
        </div>
    </nav>    
    <div class="container mx-auto">
      @foreach ($barangs as $barang)
        <x-listBarang :barang="$barang"/>    
      @endforeach
      {{-- <x-listBarang/> --}}

    </div>

    @if ($data!=null)
    <div class="fixed inset-0 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg shadow-lg p-8">
          <!-- Konten Modal -->
          <h2 class="text-xl font-bold mb-4">Edit Barang</h2>
          <form action="{{route('update_barang')}}" method="POST">
            @csrf
            <input type="hidden" name="idBarang" value="{{$data->id}}">
            <label for="nama-barang" class="block mb-2">Nama Barang:</label>
            <input type="text" id="nama-barang" class="border rounded-lg px-3 py-2 mb-4" name="nama" value="{{$data->nama}}">
            
            <label for="banyak-barang" class="block mb-2">Banyak Barang:</label>
            <input type="text" name="stok" id="banyak-barang" class="border rounded-lg px-3 py-2 mb-4" value="{{$data->stok}}">
            <div class="flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Simpan
                </button>
          </form>
          <!-- Tombol-tombol -->
              <a href="{{route('gudang')}}" class="cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                  Batal
              </a>
          </div>
      </div>
  </div>
    @endif


    


    <!-- <section class="container mx-auto py-8">
        @yield('content')
    </section> -->
</body>
</html>