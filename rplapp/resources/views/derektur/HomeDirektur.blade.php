<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Home Direktur</title>
</head>
<body>
<nav class="bg-green-300 py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
          <div class="flex items-center space-x-10 text-white">
          </div>
            <div class="text-white">
                <div class="mb-1 text-right">Direktur</div>
                <div class="text-xs text-right"></div>
            </div>
        </div>
    </nav>
    <!-- Bagian card konfirmasi -->
    @if ($lpb!=null)
        @foreach ($lpb as $p)
        <div class="my-5 mx-5">
            <div class="bg-gray-300 rounded-lg cursor-pointer" onclick="openPopup(event)">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-xl font-bold">Konfirmasi Pembelian</div>
                    </div>
                    <div class="ml-auto flex space-x-10 p-2 m-3">
                        <form method="POST" action="{{route('showPb',['id'=>$p->id])}}">
                            @csrf
                            <input type="hidden" name="idPb" value="{{$p->id}}">
                            <button class="bg-green-500 text-black hover:bg-red-800 hover:text-white font-bold py-2 px-10 rounded-lg text-lg">Check</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
    @endforeach
    @endif

<!-- Popup -->
@if ($dpb!=null)
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75">
        <div class="bg-white rounded-lg p-8 max-w-md">
            <h2 class="text-2xl font-bold mb-4">Konfirmasi Pesanan</h2>
            <p class="text-lg mb-4">Permintaan konfirmasi pembelian barang oleh staff Gudang {{$dpb->idKaryawan}} dikarenakan stock barang menipis. Detail Pembelian?</p>
            <h2 class="text-2xl mb-4">Nama Barang : {{$barang->nama}}</h2>
            <h2 class="text-2xl mb-4">Harga Satuan : {{$barang->harga_beli}}</h2>
            <h2 class="text-2xl mb-4">Satuan : {{$dpb->satuan}}</h2>
            <h2 class="text-2xl mb-4">Jumlah : {{$dpb->banyak}}</h2>
            <div class="flex justify-end">
                <form action="{{route('konfirmasi_beli')}}" method="POST">
                    @csrf
                    <input type="hidden" name="idPb" value="{{$dpb->id}}">
                    <button type="submit" name="stat" value="0" class="bg-red-500 text-white px-4 py-2 rounded">Batal</button>
                    <button value="1" type="submit" name="stat" class="bg-green-500 text-white px-4 py-2 rounded ml-2" >Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
@endif

<script>
    function openPopup(event) {
        event.stopPropagation();
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }

    function deleteItem(event) {
        event.stopPropagation();
        // Tambahkan logika penghapusan item di sini
    }
</script>

</body>
</html>
