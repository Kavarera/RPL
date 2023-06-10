<div class="my-5 mx-5 border-rounded-full">
    <div class="bg-gray-300">
        <div class="flex items-center">
            <div class="w-16 h-16 bg-white border border-black flex-shrink-0"></div>
            <div class="ml-4">
                <div class="text-xl font-bold">{{ $barang->nama }}</div>
                <div class="@if ($barang->stok<60)
                    echo text-red-500 font-bold
                @endif text-sm">{{$barang->stok}}</div>
            </div>
            <div class="ml-auto flex space-x-10">
                @if ($barang->stok<60)
                <a href="{{ route('beli_barang', ['id' => $barang->id]) }}" class="bg-green-200 text-black hover:bg-green-600 hover:text-white font-bold py-2 px-10 rounded text-lg">Beli</a>
                
                @endif

                {{-- <button @click="isOpen = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Barang
                </button> --}}

                <form action="{{ route('store_barang')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$barang->id}}" name="idb">
                    <button type="submit" class="bg-white text-black hover:bg-blue-600 hover:text-white font-bold py-2 px-10 rounded text-lg">Edit</button>
                </form>
                
                <form method="POST" action="{{ route('deleteBarang') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$barang->id}}" name="id">
                    <button class="bg-red-500 text-black hover:bg-red-800 hover:text-white font-bold py-2 px-10 rounded text-lg">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>