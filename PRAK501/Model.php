<?php
require_once "Koneksi.php";

// === MEMBER ===
function getAllMember() {
    global $conn;
    return $conn->query("SELECT * FROM member");
}

function getMemberById($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("SELECT * FROM member WHERE id_member = $id")->fetch_assoc();
}

function insertMember($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $data['nama'], $data['nomor'], $data['alamat'], $data['tgl_daftar'], $data['tgl_bayar']);
    return $stmt->execute();
}

function updateMember($id, $data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    $stmt->bind_param("sssssi", $data['nama'], $data['nomor'], $data['alamat'], $data['tgl_daftar'], $data['tgl_bayar'], $id);
    return $stmt->execute();
}

function deleteMember($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("DELETE FROM member WHERE id_member = $id");
}

// === BUKU ===
function getAllBuku() {
    global $conn;
    return $conn->query("SELECT * FROM buku");
}

function getBukuById($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("SELECT * FROM buku WHERE id_buku = $id")->fetch_assoc();
}

function insertBuku($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $data['judul'], $data['penulis'], $data['penerbit'], $data['tahun']);
    return $stmt->execute();
}

function updateBuku($id, $data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    $stmt->bind_param("sssii", $data['judul'], $data['penulis'], $data['penerbit'], $data['tahun'], $id);
    return $stmt->execute();
}

function deleteBuku($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("DELETE FROM buku WHERE id_buku = $id");
}

// === PEMINJAMAN ===
function getAllPeminjaman() {
    global $conn;
    return $conn->query("SELECT p.*, m.nama_member, b.judul_buku FROM peminjaman p
                         JOIN member m ON p.id_member = m.id_member
                         JOIN buku b ON p.id_buku = b.id_buku");
}

function getPeminjamanById($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("SELECT * FROM peminjaman WHERE id_peminjaman = $id")->fetch_assoc();
}

function insertPeminjaman($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $data['id_member'], $data['id_buku'], $data['tgl_pinjam'], $data['tgl_kembali']);
    return $stmt->execute();
}

function updatePeminjaman($id, $data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    $stmt->bind_param("iissi", $data['id_member'], $data['id_buku'], $data['tgl_pinjam'], $data['tgl_kembali'], $id);
    return $stmt->execute();
}

function deletePeminjaman($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("DELETE FROM peminjaman WHERE id_peminjaman = $id");
}
?>
