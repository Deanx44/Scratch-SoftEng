<?php
session_start();
session_regenerate_id();

if (!$_SESSION['userid']) {
    header("Location:index.php?login-first");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../../inc/cdn.php"; ?>
    <?php include "../../CSS/links.php"; ?>
    <title>Home</title>
    <style>
        .main .col.card .row {
            align-items: center;
        }

        .wd-100 {
            width: 100%;
        }
    </style>
</head>

<body>

    <?php
    $userid = $_GET['userid'];
    $source = $_GET['source'];
    $active = "Feedback";
    include "../../inc/Include.php";
    include "side-bar.php";

    // Pagination variables
    $limit = 5; // Number of results per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Get total number of ratings
    $totalQuery = "SELECT COUNT(*) as total FROM ratings WHERE type = '$source'";
    $totalResult = mysqli_query($conn, $totalQuery);
    $totalRows = mysqli_fetch_assoc($totalResult)['total'];
    $totalPages = ceil($totalRows / $limit);

    // Fetch ratings with pagination
    $select = "SELECT * FROM ratings
                INNER JOIN user ON ratings.userid = user.userid
                WHERE type = '$source'
                LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $select);
    ?>

    <div class="main">
        <form action="inc/ratings.php" style="width: 100%;" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            <?php include "header.php"; ?>
            <input type="hidden" value="<?php echo "$userid"; ?>" name="userid">

            <div class="row wrap" id="ticketed">
                <div class="col body">
                    <div class="row">
                        <div class="col-12 body" style="background-color: var(--main-300);color: white;">
                            <h4>Reviews</h4>
                        </div>
                    </div>
                    <div class="row body">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($rows = mysqli_fetch_array($result)) {
                        ?>
                                <div class="col-12">
                                    <p><?php echo $rows['firstname'] . ' ' . $rows['lastname']; ?></p>
                                    <?php
                                    $rate = intval($rows['ratings']);
                                    $blackRate = 5 - $rate;

                                    for ($rate; $rate > 0; $rate--) {
                                        echo "<i class='fa-solid fa-star fa-fw' style='color:var(--danger)'></i>";
                                    }

                                    for ($blackRate; $blackRate > 0; $blackRate--) {
                                        echo "<i class='fa-solid fa-star fa-fw' style='color:var(--font)'></i>";
                                    }
                                    ?>
                                    <p class="text-secondary"><?php echo $rows['dateCreated']; ?></p>
                                    <p class="w-700 py-2"><?php echo $rows['feedback']; ?></p>
                                    <img src="ratings/<?php echo $rows['photo']; ?>" alt="review-photo" width="200px;" height="200px;" style="object-fit:cover;">
                                    <hr>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<p>No reviews found.</p>";
                        }
                        ?>

                        <!-- Pagination Links -->
                        <div class="col-12 d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $page - 1; ?>&userid=<?php echo $userid; ?>&source=<?php echo $source; ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>&userid=<?php echo $userid; ?>&source=<?php echo $source; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($page < $totalPages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $page + 1; ?>&userid=<?php echo $userid; ?>&source=<?php echo $source; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>