# CRUD-Transaksi-Rental-Alat-Berat-4

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-orange.svg)
![PHP](https://img.shields.io/badge/PHP-7.x-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.x-green.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-purple.svg)

Aplikasi CRUD (Create, Read, Update, Delete) untuk manajemen transaksi rental alat berat yang dibangun menggunakan framework CodeIgniter.

## Fitur

- Dashboard dengan statistik real-time
- CRUD lengkap untuk data transaksi
- Form tambah transaksi dengan dropdown customer dan alat berat
- Form edit transaksi dengan update status
- Form penyelesaian transaksi dengan tanggal pengembalian dan denda
- Validasi form input
- Modal konfirmasi untuk hapus data
- Notifikasi untuk operasi CRUD
- Template admin yang responsif dan modern
- Sidebar navigasi yang terstruktur
- Tabel data dengan sorting dan searching
- Update otomatis status alat berat saat transaksi dibuat, diedit, atau dihapus

## Struktur Direktori
<img width="275" height="371" alt="image" src="https://github.com/user-attachments/assets/7bfec7f2-254e-432e-9f44-48c9b118ba27" />


## Struktur Database

Tabel: `transaksi`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_transaksi | INT(11) | Primary Key, Auto Increment |
| id_customer | INT(11) | Foreign Key ke customer.id_customer |
| id_alat | INT(11) | Foreign Key ke alat_berat.id_alat |
| id_admin | INT(11) | Foreign Key ke admin.id_admin |
| tanggal_sewa | DATE | Tanggal mulai sewa |
| tanggal_kembali | DATE | Tanggal selesai sewa |
| total_bayar | DECIMAL(10,2) | Total pembayaran |
| status | ENUM('proses', 'selesai', 'batal') | Status transaksi |
| tanggal_pengembalian | DATE | Tanggal pengembalian aktual |
| denda | DECIMAL(10,2) | Denda jika terlambat |

## Screenshot Aplikasi
- Data Transaksi
<img width="827" height="440" alt="image" src="https://github.com/user-attachments/assets/b8b101f8-a07d-479f-a4b6-6b688b4f8bfc" />

- Tambah Peminjaman
<img width="827" height="440" alt="image" src="https://github.com/user-attachments/assets/d442335b-593e-4966-9017-20606d24b142" />

---
**luqmanaru**

Ini adalah proyek pengembangan web lanjut untuk memenuhi tugas kuliah Pemrograman Web Lanjut
