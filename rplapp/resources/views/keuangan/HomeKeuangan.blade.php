<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan</title>
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

    <div class="container mx-auto py-6 mt-12">
        <div class="p-12">
            <div class="flex justify-center items-center mb-8">
                <div class="card mr-4 border-4 p-6 rounded-lg">
                    <a href="{{route('pengeluaran')}}">
                        <img class="w-32 mt-auto" src="{{asset('images/test.png')}}" alt="Pengeluaran Perbulan" id="" />
                        <h6 class="text-center mt-3">Pengeluaran bulanan</h6>
                    </a>
                </div>
                <div class="card mr-4 border-4 p-6 rounded-lg">
                    <a href="{{route('biaya')}}">
                        <img class="w-32 mt-auto" src="{{asset('images/analytics.png')}}" alt="Biaya Oprasonal" id="" />
                        <h6 class="text-center mt-3">Biaya Oprasonal</h6>
                    </a>
                </div>
                <div class="card mr-4 border-4 p-6 rounded-lg">
                    <a href="{{route('harga')}}">
                        <img class="w-32 mt-auto" src="{{asset('images/box.png')}}" alt="Harga Barang" id="" />
                        <h6 class="text-center mt-3">Harga Barang</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
