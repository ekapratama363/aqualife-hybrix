<?php

function slug($string) {
    // Ubah ke huruf kecil
    $string = strtolower($string);
    // Hapus karakter selain huruf, angka, dan spasi
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    // Ganti spasi dengan tanda strip (-)
    $string = preg_replace('/\s+/', '_', $string);
    // Hapus strip ganda (jika ada)
    $string = preg_replace('/-+/', '_', $string);
    // Hapus strip di awal dan akhir
    $string = trim($string, '_');

    return $string;
}