<?php
session_start();
session_regenerate_id();

if (!$_SESSION['userid']) {
    header("Location:index.php?login-first");
    exit();
}
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
        .main .col.card .row {
            align-items: center;
        }
        .star-rating {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }
        .star-rating input {
            display: none;
        }
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
        .booking-selector {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php
    $userid = $_GET['userid'];
    $active = "Feedback";
    include "../../inc/Include.php";
    include "side-bar.php";
    ?>
    
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
                    
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <div class="alert alert-success mt-3">
                            <?php 
                            echo $_SESSION['success_message']; 
                            unset($_SESSION['success_message']);
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger mt-3">
                            <?php 
                            echo $_SESSION['error_message']; 
                            unset($_SESSION['error_message']);
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($_GET['alert']) && $_GET['alert'] == 1): ?>
                        <div class="alert alert-success mt-3">
                            God bless you always!
                        </div>
                    <?php endif; ?>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <!-- Booking Selection -->
                            <div class="booking-selector">
                                <h6>Select Your Booking to Rate (Optional)</h6>
                                <p class="text-muted small">If you want to rate a specific booking, select it below. Otherwise, leave it blank for general feedback.</p>
                                
                                <?php
                                // Simple query to get bookings without complex joins
                                $bookings_query = "SELECT id, booking_type, booking_id, created_at FROM booking WHERE userid = ? ORDER BY created_at DESC LIMIT 10";
                                
                                $stmt = $conn->prepare($bookings_query);
                                if ($stmt) {
                                    $stmt->bind_param("i", $userid);
                                    $stmt->execute();
                                    $bookings = $stmt->get_result();
                                    
                                    if ($bookings->num_rows > 0) {
                                ?>
                                
                                <select class="form-select" name="selected_booking" id="bookingSelect" onchange="updateBookingFields()">
                                    <option value="">Select a booking (optional)</option>
                                    <?php while ($booking = $bookings->fetch_assoc()): ?>
                                        <option value="<?php echo $booking['id'] . '|' . $booking['booking_type'] . '|' . $booking['booking_id']; ?>">
                                            <?php echo ucfirst($booking['booking_type']); ?> Booking #<?php echo $booking['id']; ?>
                                            (<?php echo date('M d, Y', strtotime($booking['created_at'])); ?>)
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                                
                                <?php
                                    } else {
                                        echo '<div class="alert alert-info">No recent bookings found.</div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-warning">Unable to load bookings at this time.</div>';
                                }
                                ?>
                                
                                <!-- Hidden fields for booking details -->
                                <input type="hidden" name="booking_id" id="bookingId">
                                <input type="hidden" name="booking_type" id="bookingType">
                                <input type="hidden" name="tourid" id="tourId">
                                <input type="hidden" name="ticketid" id="ticketId">
                            </div>
                            
                            <!-- Rating Form -->
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
                                    <label for="star1">★</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Your Feedback</label>
                                <textarea class="form-control" name="feedback" rows="4" placeholder="Tell us about your experience..."></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Upload Photo (Optional)</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                                < class="text-muted">Accepted formats: JPG, JPEG, PNG. Max size: 5MB</small>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-paper-plane"></i> Submit Feedback
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateBookingFields() {
            const select = document.getElementById('bookingSelect');
            const selectedValue = select.value;
            
            // Clear all hidden fields first
            document.getElementById('bookingId').value = '';
            document.getElementById('bookingType').value = '';
            document.getElementById('tourId').value = '';
            document.getElementById('ticketId').value = '';
            
            if (selectedValue) {
                const parts = selectedValue.split('|');
                const bookingId = parts[0];
                const bookingType = parts[1];
                const referenceId = parts[2];
                
                document.getElementById('bookingId').value = bookingId;
                document.getElementById('bookingType').value = bookingType;
                
                // Set specific ID based on booking type
                if (bookingType === 'tour') {
                    document.getElementById('tourId').value = referenceId;
                } else if (bookingType === 'ticket') {
                    document.getElementById('ticketId').value = referenceId;
                }
            }
        }

        // Star rating functionality
        document.querySelectorAll('.star-rating input').forEach(input => {
            input.addEventListener('change', function() {
                const rating = this.value;
                console.log('Rating selected:', rating);
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const rating = document.querySelector('input[name="rate"]:checked');
            if (!rating) {
                e.preventDefault();
                alert('Please select a rating before submitting.');
                return false;
            }
        });
    </script>
</body>

</html>