<?php
$produk = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Laptop",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 150000,
        "stok" => 10
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "Aksesoris",
        "harga" => 650000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 450000,
        "stok" => 7
    ],
    [
        "nama" => "SSD NVMe 1TB",
        "kategori" => "Storage",
        "harga" => 1250000,
        "stok" => 5
    ],
    [
        "nama" => "Webcam Full HD",
        "kategori" => "Aksesoris",
        "harga" => 320000,
        "stok" => 0
    ],
    [
        "nama" => "Smartphone Mid Range",
        "kategori" => "Smartphone",
        "harga" => 3200000,
        "stok" => 6
    ],
];

$totalProduk = count($produk);
$diskon = 10;
$minDiskon = 1000000;

function formatRupiah($angka)
{
    return "Rp" . number_format($angka, 0, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="wrap header-inner container">
            <a class="logo" href="#">CIA STORE</a>
            <nav aria-label="Navigasi utama">
                <a href="#">Beranda</a>
                <a href="#products">Katalog</a>
            </nav>
        </div>
    </header>

    <section class="container hero">
        <div class="hero-content">
            <div class="kolom1">
                <h1>CIA STORE</h1>
                <p>
                    Cia Store menjual perangkat dan aksesoris teknologi harian
                    dengan stok yang selalu diperbarui.
                </p>
                <a class="cta" href="#products">Lihat Katalog</a>
            </div>
            <div class="kolom2">
                <img src="https://img.pikbest.com/png-images/20250302/shopping-trolley-and-animation-person-png-image_11569180.png!sw800"
                    alt="Ilustrasi hero">
            </div>
        </div>
    </section>

    <div class="container" id="products">
        <section class="catalog">
            <div class="section-head">
                <h2>Katalog Produk</h2>
                <span><?= $totalProduk; ?> Total item</span>
            </div>

            <div class="grid">
                <?php foreach ($produk as $item): ?>
                    <?php
                    $adaDiskon = ($item["harga"] >= $minDiskon);
                    $hargaAkhir = $adaDiskon
                        ? $item["harga"] - ($item["harga"] * $diskon / 100)
                        : $item["harga"];
                    $tersedia = ($item["stok"] > 0);
                    ?>
                    <article class="card">
                        <span class="kategori"><?= ($item["kategori"]); ?></span>

                        <h3><?= ($item["nama"]); ?></h3>

                        <div class="harga">
                            <span class="harga-now"><?= formatRupiah($hargaAkhir); ?></span>
                            <?php if ($adaDiskon): ?>
                                <span class="harga-asli"><?= formatRupiah($item["harga"]); ?></span>
                                <span class="diskon">Diskon <?= $diskon; ?>%</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($tersedia): ?>
                            <span class="status status-ada">Tersedia | sisa <?= $item["stok"]; ?></span>
                            <button class="btn" type="button">Beli Sekarang</button>
                        <?php else: ?>
                            <span class="status status-habis">Stok habis</span>
                            <button class="btn" type="button" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <footer>
        <span>&copy; <?= date("Y"); ?> Cia Store</span>
        <p>Dibuat oleh <a href="https://syaddadraihanputra.github.io" target="_blank">Syaddad</a> dengan ❤️</p>
    </footer>

</body>

</html>