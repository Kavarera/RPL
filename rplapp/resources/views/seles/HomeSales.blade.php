<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header class="fixed top-0 w-full" >
    <nav class="bg-blue-400 py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
          <div class="flex items-center space-x-10 text-teal">
          </div>
            <div class="text-white">
                <div class="mb-1 text-right">Nama Pengguna</div>
                <div class="text-xs text-right">Sales</div>
            </div>
        </div>
    </nav>
    </header>
    

    <main class="bg-g">  
      <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-4xl bg-white p-8 shadow-md rounded">
      <form method="POST" action="{{route('addPemesan')}}">
        @csrf
      <div class="flex">
        <div class="w-1/2 pr-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="companyName">
              Nama Perusahaan
            </label>
            <input name="namaPerusahaan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="companyName" type="text" placeholder="Nama Perusahaan">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="productName">
              Nama Barang
            </label>
            <select name="barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="productName">
              <option value="">Pilih Barang</option>
              @foreach ($barang as $b)
                <option value="{{$b}}">{{$b}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
              Jumlah
            </label>
            <input name="jumlah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="quantity" type="number" placeholder="Jumlah">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="productType">
              Tipe Pembayaran
            </label>
            <select name="pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="productType">
              <option value="">Pilih Tipe Pembayaran</option>
              <option value="Kredit">Kredit</option>
              <option value="Tunai">Tunai</option>
              <option value="Ansuran">Ansuran</option>
            </select>
          </div>
        </div>
        <div class="w-1/2 pl-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
              Alamat
            </label>
            <textarea name="alamat" class="shadow appearance-none border rounded w-full py-2">

            </textarea>
            </div>
        </div>

    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-green-500 rounded items-center mb-4 px-3 py-1">Kirim</button>    
    </div>
  </form>
</main>

    
</body>
                


