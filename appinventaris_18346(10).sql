-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 09.14
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appinventaris_18346`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `idinventaris` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kondisi` enum('Selesai','Proses') NOT NULL DEFAULT 'Proses',
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `tanggalregister` date NOT NULL,
  `idruang` int(11) NOT NULL,
  `kodeinventaris` varchar(255) NOT NULL,
  `idpetugas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`idinventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `idjenis`, `tanggalregister`, `idruang`, `kodeinventaris`, `idpetugas`, `created_at`, `updated_at`) VALUES
(5, 'reta', 'Proses', 'shhs', 12, 5, '2024-05-22', 4, '12', 3, '2024-05-29 17:56:45', '2024-05-29 17:56:45'),
(6, 'twyy', 'Selesai', 'orang', 1, 5, '2024-05-30', 5, '1234', 8, '2024-05-29 18:10:59', '2024-05-29 18:10:59'),
(7, 'Mareta', 'Selesai', 'Guru', 1, 5, '2024-05-30', 4, '18346', 3, '2024-05-29 18:36:56', '2024-05-29 18:36:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` int(20) UNSIGNED NOT NULL,
  `namajenis` varchar(255) NOT NULL,
  `kodejenis` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`idjenis`, `namajenis`, `kodejenis`, `keterangan`) VALUES
(5, 'kursi', '0011', 'benda1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `idlevel` bigint(20) UNSIGNED NOT NULL,
  `namalevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`idlevel`, `namalevel`) VALUES
(1, 'administrator\r\n'),
(2, 'kepala gudang'),
(3, 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_15_093532_create_petugas_table', 1),
(6, '2024_04_15_100238_create_levels_table', 1),
(7, '2024_04_16_053653_create_jenis_table', 2),
(8, '2024_04_19_072037_create_ruangs_table', 3),
(9, '2024_04_23_093354_create_pegawais_table', 4),
(10, '2024_04_23_121923_create_inventaris_table', 5),
(11, '2024_04_26_093946_inventaris', 6),
(12, '2024_04_26_094248_inventaris', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `idpegawai` bigint(20) UNSIGNED NOT NULL,
  `namapegawai` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`idpegawai`, `namapegawai`, `nip`, `alamat`) VALUES
(7, 'nananana', 1234567, 'whdbcw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamen`
--

CREATE TABLE `peminjamen` (
  `idpeminjaman` int(10) NOT NULL,
  `tanggalpeminjaman` date DEFAULT NULL,
  `tanggalkembali` date DEFAULT NULL,
  `statuspeminjaman` enum('Diproses','Dipinjam','Dikembalikan','Proses kembali','Pengembalian Ditolak','Peminjaman Ditolak') NOT NULL DEFAULT 'Diproses',
  `idpegawai` int(11) NOT NULL,
  `idinventaris` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlahkembali` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjamen`
--

INSERT INTO `peminjamen` (`idpeminjaman`, `tanggalpeminjaman`, `tanggalkembali`, `statuspeminjaman`, `idpegawai`, `idinventaris`, `jumlah`, `jumlahkembali`, `created_at`, `updated_at`) VALUES
(1, '5633-05-04', '0678-05-31', 'Diproses', 2, 2, 11, 0, '2024-05-03 23:07:12', '2024-05-03 23:07:12'),
(2, '2024-05-22', '2024-05-24', 'Diproses', 2, 2, 4, 0, '2024-05-16 02:11:09', '2024-05-16 02:11:09'),
(4, '2024-05-27', '2024-05-28', 'Dikembalikan', 3, 2, 12, 0, '2024-05-26 23:15:06', '2024-05-26 23:15:46'),
(6, NULL, NULL, 'Peminjaman Ditolak', 7, 2, 1, 0, '2024-05-26 23:59:38', '2024-05-27 00:02:19'),
(7, '2024-05-30', '2024-05-31', 'Diproses', 7, 4, 2, 0, '2024-05-29 12:37:10', '2024-05-29 12:37:10'),
(9, '2024-05-30', '2024-05-30', 'Dikembalikan', 7, 5, 2, 0, '2024-05-29 18:03:48', '2024-05-29 18:14:52'),
(13, '2024-05-30', '2024-05-31', 'Diproses', 7, 7, 1, 0, '2024-05-29 21:48:29', '2024-05-29 21:48:29'),
(14, '2024-05-30', '2024-05-30', 'Dikembalikan', 7, 5, 2, 0, '2024-05-29 21:50:56', '2024-05-29 21:51:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namapetugas` varchar(225) NOT NULL,
  `idlevel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `username`, `password`, `namapetugas`, `idlevel`, `created_at`, `updated_at`) VALUES
(3, '197909172014062006', '$2y$10$xrQgdoQtoqAHNrKZpfoTtOhPayLvbs3XmxOqWE3TusS9JBDoJCG3i', 'rere', 1, NULL, NULL),
(6, '12345', '$2y$10$/QL8c6TLaZ03KX73TxZiz./UBe3F.lXPFLLu4fyDDrDmzbMya7p26', 'mmaa', 2, NULL, NULL),
(8, 'Rere', 'rereaja', 'Mareta', 1, NULL, NULL),
(12, 'Asavan', '$2y$10$9Hzz7aA/yA3Te8aMoa6c/.eRQr136rHkqYNz69YuAnNefnSn8WTni', 'Asa Sayang', 1, NULL, NULL),
(13, 'AsaOP', '$2y$10$LrNfHwkt6WXOqi9Jpmgnb.NpcLhBCw.j1ppIoTBUDC56ln31yPMde', 'Asa Sayang 2', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangs`
--

CREATE TABLE `ruangs` (
  `idruang` bigint(20) UNSIGNED NOT NULL,
  `namaruang` varchar(255) NOT NULL,
  `koderuang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangs`
--

INSERT INTO `ruangs` (`idruang`, `namaruang`, `koderuang`, `keterangan`) VALUES
(4, 'kelas', '01', 'kelas1'),
(5, 'guru', '14', 'gtrdxd12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`idinventaris`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indeks untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`idpeminjaman`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indeks untuk tabel `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`idruang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `idinventaris` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `idlevel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `idpegawai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `idpeminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `idruang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
