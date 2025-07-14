<?php
session_start();
session_regenerate_id();

if (!$_SESSION['userid']) {
    header("Location:index.php?login-first");
    exit();
}

$userid = $_GET['userid'];
$active = "Feedback";
include "../../inc/Include.php";
include "side-bar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../../inc/cdn.php" ?>
    <?php include "../../CSS/links.php" ?>
    <title>Feedback & Ratings</title>
    <style>
        .star-rating {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }
        .star-rating input { display: none; }
        .star-rating label {
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: block;
            color: #ddd;
            font-size: 25px;
            margin: 0 2px;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: #ffc107;
        }
    </style>
</head>

<body>
    <div class="main">
        <form action="inc/ratings.php" style="width: 100%;" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            <?php include "header.php"; ?>
            <input type="hidden" value="<?php echo $userid; ?>" name="userid">
            
            <div class="row wrap">
                <div class="col body">
                    <div class="row">
                        <div class="col-12 body" style="background-color: var(--main-300);color: white;">
                            <h4><i class="fa-solid fa-star"></i> Feedback & Ratings</h4>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Type *</label>
                                        <select class="form-select" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="Domestic">Domestic</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Place/Destination *</label>
                                        <input type="text" class="form-control" name="place" required placeholder="Enter destination">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Your Rating *</label>
                                <div class="star-rating">
                                    <input type="radio" name="rate" value="5" id="star5" required>
                                    <label for="star5">★</label>
                                    <input type="radio" name="rate" value="4" id="star4">
                                    <label for="star4">★</label>
                                    <input type="radio" name="rate" value="3" id="star3">
                                    <label for="star3">★</label>
                                    <input type="radio" name="rate" value="2" id="star2">
                                    <label for="star2">★</label>
                                    <input type="radio" name="rate" value="1" id="star1">
                                    <label