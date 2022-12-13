        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <style>
                .bg-menu{
                    background-image: linear-gradient(#C70909, #F0BF0F);
                }
            </style>
        </head>

        <body>
                   
         <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion bg-menu" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">LAUNDRY <sup>ONLINE</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url()?>konsumen">
        <span>Data Konsumen</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url()?>paket">
        <span>Data Paket</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url()?>transaksi/tambah">
        <span>Tambah Transaksi</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <span>Riwayat Transaksi</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <span>Laporan</span></a>
</li>

</ul>
        </body>
        </html>
