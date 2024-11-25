<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/dua.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{ url(Auth::user()->role . '/pert2') }}"> Home</a></li>
            <li><a href="{{ url(Auth::user()->role . '/produk') }}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="{{ url(Auth::user()->role . '/laporan') }}">Laporan</a></li>
            <li>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-decoration-none bg-transparent border-0 text-white"
                        style="font-size: 18px;">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <!-- header style="display: flex; justify-content: space-between"></header-->
        <header>
            <h1>Selamat Datang di Dashboard Penjualan</h1>
        </header>
        <!-- Product Card 1 -->
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Produk 1">
            <h3>Produk 1</h3>
            <p class="price">Rp 100,000</p>
            <p class="description">Deskripsi singkat produk 1.</p>
            <button class="add-to-cart"> + </button>
            <button class="cancel-to-cart"> - </button>
        </div>
        <!-- Product Card 2 -->
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Produk 2">
            <h3>Produk 2</h3>
            <p class="price">Rp 200,000</p>
            <p class="description">Deskripsi singkat produk 2.</p>
            <button class="add-to-cart"> + </button>
            <button class="cancel-to-cart"> - </button>
        </div>
        <!-- Product Card 3 -->
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Produk 3">
            <h3>Produk 3</h3>
            <p class="price">Rp 300,000</p>
            <p class="description">Deskripsi singkat produk 3.</p>
            <button class="add-to-cart"> + </button>
            <button class="cancel-to-cart"> - </button>
        </div>
        <!-- Product Card 4 -->
        <div class="product-card">
            <img src="https://via.placeholder.com/200" alt="Produk 4">
            <h3>Produk 4</h3>
            <p class="price">Rp 400,000</p>
            <p class="description">Deskripsi singkat produk 4.</p>
            <button class="add-to-cart"> + </button>
            <button class="cancel-to-cart"> - </button>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="product-grid">
        <!-- Product Card 1 -->
        @foreach ($produk as $item)
            <div class="product-card">
                <img src="https://via.placeholder.com/200" alt="Produk 1">
                <h3>{{ $item->nama_produk }}</h3>
                <p class="price">{{ $item->harga }}</p>
                <p class="description">{{ $item->deskripsi }}</p>
                <button class="card-button"> Edit</button>
                <button class="card-button"> Delete </button>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
    </footer>
</body>

</html>
