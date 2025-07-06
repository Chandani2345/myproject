<?php
include 'config.php';

$name = $_POST['name'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$sql = "INSERT INTO reviews (name, rating, comment) 
        VALUES ('$name', '$rating', '$comment')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Review submitted successfully!'); window.location.href='index.php#review';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
