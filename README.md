kasir-php/              <-- Root Folder Project di c:\laragon\www\
│
├── assets/             <-- File Statis
│   ├── css/            <-- File CSS custom (dan Bootstrap jika download manual)
│   ├── js/             <-- File JavaScript (dan Bootstrap/jQuery)
│   └── img/            <-- Gambar/Logo aplikasi
│
├── config/             <-- Konfigurasi Sistem
│   └── database.php    <-- File koneksi ke MySQL menggunakan PDO
│
├── includes/           <-- Snippet Kode yang sering dipakai (Reusability)
│   ├── header.php      <-- Bagian atas HTML (Navbar, link CSS)
│   ├── footer.php      <-- Bagian bawah HTML (Script JS, copyright)
│   ├── sidebar.php     <-- Menu samping (berbeda untuk Admin/Kasir)
│   └── function.php    <-- Fungsi-fungsi pembantu (validasi, format uang, cek login)
│
├── modules/            <-- Logika Utama (Halaman CRUD & Proses)
│   ├── auth/           <-- Login & Logout
│   ├── dashboard/      <-- Halaman Utama setelah login
│   ├── kategori/       <-- CRUD Kategori (Hanya Admin)
│   ├── produk/         <-- CRUD Produk & Stok (Hanya Admin)
│   ├── user/           <-- CRUD User (Hanya Admin)
│   └── transaksi/      <-- Halaman Kasir (POS) & Riwayat
│
├── uploads/            <-- Folder untuk menyimpan foto produk yang diupload
│
└── index.php           <-- File utama/Gerbang masuk aplikasi