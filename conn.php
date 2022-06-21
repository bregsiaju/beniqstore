<?php

$conn = mysqli_connect('localhost', 'root', '', 'beniq_db');

function query($query)
{
   global $conn;
   $result = mysqli_query($conn, $query);
   return $result;
}

function search($keyword)
{
   $query = "SELECT * FROM produk
            WHERE
            nama_produk LIKE '%$keyword%'
            ";
   return query($query);
}

function categories($category)
{
   $query = "SELECT * FROM produk WHERE kategori = '$category'";
   return query($query);
}
