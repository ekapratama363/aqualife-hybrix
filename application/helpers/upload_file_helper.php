<?php

function upload_file($file, $dir)
{
    $filename = rand() . $file['name'];
    $ext      = pathinfo($filename, PATHINFO_EXTENSION);

    $target_dir  = "uploads/$dir";
    $target_file = $target_dir . '/' . basename($filename);

    $extensions = ['jpg', 'jpeg', 'png', 'webp'];
    
    if (!in_array($ext, $extensions)) {
        $message = 'ekstensi harus ' . json_encode($extensions);
        $status = false;
    } elseif ($file["size"] > 20000000) {
        $message = 'gambar terlalu besar';
        $status = false;
    } else {
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        move_uploaded_file($file["tmp_name"], $target_file);
        $message = $target_file;
        $status = true;
    }

    return [
        'status' => $status,
        'message' => $message,
    ];
}