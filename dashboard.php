<?php
session_start();
session_regenerate_id();

$successMessage = isset($_SESSION['success']) ? $_SESSION['success'] : '';

if (!$_SESSION['userid']) {
    header("Location:index.php?login-first");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../../inc/cdn.php" ?>
    <?php include "../../CSS/links.php" ?>
    <title>Home</title>
    <style>
        .header {
            background-color: rgba(255, 255, 255, 1);
            padding: 16px;
            border-radius: 4px;
            margin-bottom: 16px;
            box-shadow: 0px 3px 5px -3px rgb(0 0 0 / 12%);
        }

        .main .col.card .row {
            align-items: center;
        }

        /* .main {
            background: white;
        } */

        .main .row.w-100 h1 {
            font-family: Analogue;
            font-size: 30px;
            font-weight: 700;
        }

        .main .row.body {
            padding: 0;
        }

        .main .row.banner {
            background-image: url(../../Assets/home_banner.jpg);
            background-size: contain;
            background-position: 0% 15%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-style: normal;
            height: 30vh;
            width: 100%;
        }

        .main .row .card {
            border: none;
            padding: 0;
        }

        .main .row .card-body {
            padding: 0;
        }

        .main .row.body.row.w-100 {
            max-width: 80rem;
            box-shadow: none;
        }

        .gallery {
            overflow: hidden;
            padding: 24px 0;
            white-space: nowrap;
            position: relative;
        }

        .gallery .slide-gallery {
            display: inline-block;
            animation: 15s slide infinite linear;
        }

        .gallery:hover .slide-gallery {
            animation-play-state: paused;
        }

        .gallery .slide-gallery img {
            margin: 0 8px;
            width: 200px;
            border-radius: 4px;
            box-shadow: 0px 3px 5px -3px rgba(0, 0, 0, 0.9);
        }

        /* 
        .gallery::before,
        .gallery::after {
            content: "";
            position: absolute;
            top: 0;
            height: 100%;
            width: 180px;
            z-index: 5;
        }

        .gallery::before {
            background: linear-gradient(to left, rgba(255, 255, 255, 0), white);
            left: 0;
        }

        .gallery::after {
            background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
            right: 0;
        } */

        @keyframes slide {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        p {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>

    <?php
    $userid = $_GET['userid'];
    $active = "dashboard";
    include "../../inc/Include.php";
    include "side-bar.php";
    include "header.php";

    $query = "SELECT * FROM tourpackage WHERE type = 'Domestic' AND isArchive = FALSE LIMIT 6";
    $res = mysqli_query($conn, $query);

    $query2 = "SELECT tp.*, COUNT(tb.tourid) AS entry_count FROM tourpackage tp LEFT JOIN tourbooking tb ON tp.tourid = tb.tourid WHERE isArchive = FALSE GROUP BY tp.tourid ORDER BY entry_count DESC LIMIT 10";
    $res2 = mysqli_query($conn, $query2);

    $query3 = "SELECT * FROM tourpackage WHERE type = 'International' AND isArchive = FALSE LIMIT 6 ";
    $res3 = mysqli_query($conn, $query3);


    $interTop = "SELECT r.place, COUNT(r.ratings) AS entry_count, AVG(r.ratings) AS average_rating
                FROM ratings r
                WHERE type = 'International'
                GROUP BY r.place
                ORDER BY average_rating DESC, entry_count DESC
                LIMIT 5;";
    $topRes = mysqli_query($conn, $interTop);

    $domTop = "SELECT r.place, COUNT(r.ratings) AS entry_count, AVG(r.ratings) AS average_rating
            FROM ratings r
            WHERE type = 'Domestic'
            GROUP BY r.place
            ORDER BY average_rating DESC, entry_count DESC
            LIMIT 5;";
    $domRes = mysqli_query($conn, $domTop);

    $labels = [];
    $averageRatings = [];
    $entryCounts = [];
    while ($row = mysqli_fetch_assoc($topRes)) {
        $labels[] = $row['place']; // Place names
        $averageRatings[] = $row['average_rating'];
        $entryCounts[] = $row['entry_count'];
    }

    $labelsDom = [];
    $averageRatingsDom = [];
    $entryCountsDom = [];
    while ($row2 = mysqli_fetch_assoc($domRes)) {
        $labelsDom[] = $row2['place']; // Place names
        $averageRatingsDom[] = $row2['average_rating'];
        $entryCountsDom[] = $row2['entry_count'];
    }


    function getDateDuration($bsdate, $bedate)
    {
        $bsdate = date_create($bsdate);
        $bedate = date_create($bedate);

        $formattedBsdate = date_format($bsdate, 'M j, Y');
        $formattedBedate = date_format($bedate, 'M j, Y');

        return $formattedBsdate . ' - ' . $formattedBedate;
    }

    ?>
    <div class="main">
        <div class="row">
            <div class="col head">
                <h1><i class="fa-solid fa-house fa-fw"></i>&nbsp;&nbsp;Dashboard</h1>
            </div>
        </div>

        <div class="row body">
            <div class="row banner">

            </div>
            <div class="row mt-2 mb-3 w-100 justify-content-center">

                <div class="row body w-100">
                    <div class="col-12 mt-4 text-center">
                        <h1 class="text-uppercase">Best Destinations to Travel</h1>
                        <label class="w-500">Discover your perfect getaway and uncover the best travel hotspots</label>
                    </div>
                    <div class="col-6 mt-3 text-center">
                        <h5 class="text-uppercase">International</h5>
                        <canvas id="myChart" class="mb-3"></canvas>
                        <a href="reviews.php?userid=<?php echo $userid ?>&source=international" class="mt-4" style="font-size: 14px;">View all reviews</a>
                    </div>
                    <div class="col-6 mt-3 text-center">
                        <h5 class="text-uppercase">Domestic</h5>
                        <canvas id="myCharte" class="mb-3"></canvas>
                        <a href="reviews.php?userid=<?php echo $userid ?>&source=domestic" class="mt-4" style="font-size: 14px;">View all reviews</a>
                    </div>
                </div>
                <div class="row body w-100">
                    <div class="col-12 mt-4 ">
                        <h1 class="text-uppercase">Top-Rated Travel Hotspots</h1>
                        <label class="w-500">Discover your perfect getaway and uncover the best travel hotspots</label>
                    </div>
                    <?php
                    if (mysqli_num_rows($res2) > 0) {
                        while ($row = mysqli_fetch_array($res2)) {
                    ?>
                            <div class="col-4 mt-3">
                                <div class="card mr-3 mb-3" style="width: 22rem;">
                                    <div class="image-container">
                                        <a href="view-package.php?packageid=<?php echo "$row[tourid]&userid=$userid" ?>">
                                            <img style="height:15rem;object-fit:cover;" src="../admin/uploads/<?php echo "$row[img]" ?>" class="card-img-top" alt="tour-package">
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <label class="days mb-0 w-500 mt-1" style="color:#6b6b6b"><?php echo getDateDuration($row['bsdate'], $row['bedate']) ?></label>
                                        <h5 class="card-title w-700 mb-1 text-uppercase" style="letter-spacing: -1px; font-size: 18px;"><?php echo "$row[title]" ?></h5>
                                        <p class="mt-1 mb-2"><?php echo "$row[description]" ?></p>
                                        <div class="flex">
                                            <a href="view-package.php?packageid=<?php echo "$row[tourid]&userid=$userid" ?>" class="btn btn-sm btn-primary book-btn" style="background: transparent; border:1px solid var(--blue);color: var(--blue);">More info</a>
                                            <h6 class="price w-500 text-danger mb-0" style="font-size:12px;">From PHP <label style="font-size: 18px" class="mb-0"><?php echo number_format($row['price'], 0) ?></label> /person</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="row body w-100">
                    <div class="col-12 mt-4 ">
                        <h1 class="text-uppercase">Explore Philippines with best deals</h1>
                        <label class="w-500">Pick a vibe and explore the top destinations in the Philippines</label>
                    </div>
                    <?php
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {
                    ?>
                            <div class="col-4 mt-3">
                                <div class="card mr-3 mb-3" style="width: 22rem;">
                                    <div class="image-container">
                                        <a href="view-package.php?packageid=<?php echo "$row[tourid]&userid=$userid" ?>">
                                            <img style="height:12rem;object-fit:cover;" src="../admin/uploads/<?php echo "$row[img]" ?>" class="card-img-top" alt="tour-package">
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <label class="days mb-0 w-500 mt-1" style="color: #6b6b6b;"><?php echo getDateDuration($row['bsdate'], $row['bedate']) ?></label>
                                        <h5 class="card-title w-700 mb-1 text-uppercase" style="letter-spacing: -1px; font-size: 18px;"><?php echo "$row[title]" ?></h5>
                                        <p class="mt-1 mb-2"><?php echo "$row[description]" ?></p>
                                        <div class="flex">
                                            <a href="view-package.php?packageid=<?php echo "$row[tourid]&userid=$userid" ?>" class="btn btn-sm btn-primary book-btn" style="background: transparent; border:1px solid var(--blue);color: var(--blue);">More info</a>
                                            <h6 class="price w-500 text-danger mb-0" style="font-size:12px;">From PHP <label style="font-size: 18px" class="mb-0"><?php echo number_format($row['price'], 0) ?></label> /person</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="row body w-100">
                    <div class="col-12 mt-4 ">
                        <h1 class="text-uppercase">Discover the World: Unbeatable International Deals!</h1>
                        <label class="w-500">Travel farther for less with our exclusive international offers!</label>
                    </div>
                    <?php
                    if (mysqli_num_rows($res3) > 0) {
                        while ($row = mysqli_fetch_array($res3)) {
                    ?>
                            <div class="col-4 mt-3">
                                <div class="card mr-3 mb-3" style="width: 20rem;">
                                    <div class="image-container">
                                        <a href="view-package.php?packageid=<?php echo "$row[tourid]&userid=$userid" ?>">
                                            <img style="height:12rem;object-fit:cover;" src="../admin/uploads/<?php echo "$row[img]" ?>" class="card-img-top" alt="tour-package">
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <label class="days mb-0 w-500 mt-1" style="color:#6b6b6b"><?php echo getDateDuration($row['bsdate'], $row['bedate']) ?></label>
                                        <h5 class="card-title w-700 mb-1 text-uppercase" style="letter-spacing: -1px; font-size: 18px;"><?php echo "$row[title]" ?></h5>
                                        <p class="mt-1 mb-2"><?php echo "$row[description]" ?></p>
                                        <div class="flex">
                                            <a href="view-package.php?packageid=<?php echo "$row[tourid]&userid=$userid" ?>" class="btn btn-sm btn-primary book-btn" style="background: transparent; border:1px solid var(--blue);color: var(--blue);">More info</a>
                                            <h6 class="price w-500 text-danger mb-0" style="font-size:12px;">From PHP <label style="font-size: 18px" class="mb-0"><?php echo number_format($row['price'], 0) ?></label> /person</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="row body w-100">
                    <div class="gallery">
                        <div class="slide-gallery">
                            <img src="../../Assets/1.webp" alt="tourist-spot">
                            <img src="../../Assets/2.webp" alt="tourist-spot">
                            <img src="../../Assets/3.webp" alt="tourist-spot">
                            <img src="../../Assets/4.webp" alt="tourist-spot">
                            <img src="../../Assets/5.webp" alt="tourist-spot">
                            <img src="../../Assets/6.webp" alt="tourist-spot">
                            <img src="../../Assets/7.webp" alt="tourist-spot">
                            <img src="../../Assets/8.webp" alt="tourist-spot">
                            <img src="../../Assets/9.webp" alt="tourist-spot">
                            <img src="../../Assets/10.webp" alt="tourist-spot">
                        </div>

                        <div class="slide-gallery">
                            <img src="../../Assets/1.webp" alt="tourist-spot">
                            <img src="../../Assets/2.webp" alt="tourist-spot">
                            <img src="../../Assets/3.webp" alt="tourist-spot">
                            <img src="../../Assets/4.webp" alt="tourist-spot">
                            <img src="../../Assets/5.webp" alt="tourist-spot">
                            <img src="../../Assets/6.webp" alt="tourist-spot">
                            <img src="../../Assets/7.webp" alt="tourist-spot">
                            <img src="../../Assets/8.webp" alt="tourist-spot">
                            <img src="../../Assets/9.webp" alt="tourist-spot">
                            <img src="../../Assets/10.webp" alt="tourist-spot">
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="successBooking"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="inc/tour.php" style="width: 100%;" id="ticket" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="modal-body mb-4 mt-4">
                            <div class="row w-100">
                                <div class="col-12">
                                    <p class="text-justify">
                                        <span class="w-700">Thank you for your booking!</span>
                                        </br>
                                        </br>
                                        We appreciate your reservation. Our team will review and process your booking promptly. Once your booking is confirmed, you will receive a confirmation email with a link to complete your payment.
                                        </br>
                                        Alternatively, you can also check your "My Booking" page in your account for payment details.</br>
                                        </br>
                                        In the meantime, if you have any questions or need further assistance, please feel free to reach out to us.
                                        </br>
                                        </br>
                                        Thank you for choosing <span class="w-700" style="color: var(--maindark);">Isla de Cuyo Travel Ease Travel Tours</span>. We look forward to serving you!


                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                const ctx = document.getElementById('myChart');
                const ctx2 = document.getElementById('myCharte');

                var labels = <?php echo json_encode($labels); ?>;
                var averageRatings = <?php echo json_encode($averageRatings); ?>;
                var entryCounts = <?php echo json_encode($entryCounts); ?>;

                var labelsDom = <?php echo json_encode($labelsDom); ?>;
                var averageRatingsDom = <?php echo json_encode($averageRatingsDom); ?>;
                var entryCountsDom = <?php echo json_encode($entryCountsDom); ?>;

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'User Ratings',
                            data: entryCounts, // Use entryCounts as the data for the doughnut
                            backgroundColor: [
                                'rgb(255, 205, 86)', // Yellow
                                'rgb(231, 76, 60)', // Red
                                'rgb(46, 204, 113)', // Green
                                'rgb(52, 152, 219)', // Light Blue
                                'rgb(155, 89, 182)' // Purple
                            ],
                            borderWidth: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var entryCount = tooltipItem.formattedValue; // Entry count
                                        var index = tooltipItem.dataIndex; // Index of the hovered item
                                        var averageRatingStr = averageRatings[index]; // Average rating from the array

                                        // Convert average rating string to a float
                                        var averageRating = parseFloat(averageRatingStr);
                                        var formattedAverage = !isNaN(averageRating) ? averageRating.toFixed(1) : 'N/A';

                                        return `${labels[index]}: Count ${entryCount} (Avg: ${formattedAverage})`;
                                    }
                                }
                            }

                        }
                    }
                });

                new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: labelsDom,
                        datasets: [{
                            label: 'User Ratings',
                            data: entryCountsDom, // Use entryCounts as the data for the doughnut
                            backgroundColor: [
                                'rgb(255, 165, 0)', // Orange
                                'rgb(0, 128, 128)', // Teal
                                'rgb(128, 0, 128)', // Purple
                                'rgb(255, 192, 203)', // Pink
                                'rgb(64, 224, 208)' // Turquoise
                            ],
                            borderWidth: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var entryCountDom = tooltipItem.formattedValue; // Entry count
                                        var index = tooltipItem.dataIndex; // Index of the hovered item
                                        var averageRatingStr = averageRatingsDom[index]; // Average rating from the array

                                        // Convert average rating string to a float
                                        var averageRating = parseFloat(averageRatingStr);
                                        var formattedAverage = !isNaN(averageRating) ? averageRating.toFixed(1) : 'N/A';

                                        return `${labels[index]}: Count ${entryCountDom} (Avg: ${formattedAverage})`;
                                    }
                                }
                            }

                        }
                    }
                });

            });

            <?php if ($successMessage): ?>
                $(document).ready(function() {
                    $('#success').modal('show');
                });
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(window.location.search);
            const alert = urlParams.get('alert');

            if (alert == 2) {
                toastr["success"]("Settings saved")


            }
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "preventDuplicates": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
</body>

</html>