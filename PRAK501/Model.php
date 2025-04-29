<?php
// Model.php

require 'Koneksi.php';

// Fungsi untuk mendapatkan semua data buku
function getAllBooks($pdo) {
    $stmt = $pdo->query("SELECT * FROM buku");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk mendapatkan data buku berdasarkan ID
function getBookById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fungsi untuk menambah data buku
function addBook($pdo, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $stmt = $pdo->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    $stmt->execute([$judul_buku, $penulis, $penerbit, $tahun_terbit]);
}

// Fungsi untuk memperbarui data buku
function updateBook($pdo, $id, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $stmt = $pdo->prepare("UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?");
    $stmt->execute([$judul_buku, $penulis, $penerbit, $tahun_terbit, $id]);
}

// Fungsi untuk menghapus data buku
function deleteBook($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
}

// Fungsi untuk menghapus semua data buku
function deleteAllBooks($pdo) {
    $stmt = $pdo->query("DELETE FROM buku");
    $stmt->execute();
}

// Fungsi untuk mendapatkan semua data peminjaman
function getAllLoans($pdo) {
    $stmt = $pdo->query("SELECT * FROM peminjaman");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk mendapatkan data peminjaman berdasarkan ID
function getLoanById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fungsi untuk menambah data peminjaman
function addLoan($pdo, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $stmt = $pdo->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
}

// Fungsi untuk memperbarui data peminjaman
function updateLoan($pdo, $id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $stmt = $pdo->prepare("UPDATE peminjaman SET id_member = ?, id_buku = ?, tgl_pinjam = ?, tgl_kembali = ? WHERE id_peminjaman = ?");
    $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id]);
}

// Fungsi untuk menghapus data peminjaman
function deleteLoan($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
}

// Fungsi untuk menghapus semua data peminjaman
function deleteAllLoans($pdo) {
    $stmt = $pdo->query("DELETE FROM peminjaman");
    $stmt->execute();
}

// Fungsi untuk mendapatkan semua data member
function getAllMembers($pdo) {
    $stmt = $pdo->query("SELECT * FROM member");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk mendapatkan data member berdasarkan ID
function getMemberById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fungsi untuk menambah data member
function addMember($pdo, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $stmt = $pdo->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar]);
}

// Fungsi untuk memperbarui data member
function updateMember($pdo, $id, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $stmt = $pdo->prepare("UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? WHERE id_member = ?");
    $stmt->execute([$nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar, $id]);
}

// Fungsi untuk menghapus data member
function deleteMember($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
}

// Fungsi untuk menghapus semua data member
function deleteAllMembers($pdo) {
    $stmt = $pdo->query("DELETE FROM member");
    $stmt->execute();
}
?>
