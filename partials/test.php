<?php
// include db 
    include 'dbconnect.php'; 
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Testimonial Slider</title>
    <link href="CSS/test.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"
        crossorigin="anonymous" />
		<script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="testi-wrap">
        <div class="container">
            <div class="row">
                <div id="testimonial-slider" class="owl-carousel">
                    <?php  
							$sql = "SELECT stu_name, stu_occ, stu_img, f_content FROM student JOIN feedback ON 'stu_id' = 'stu_id'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$stu_img = $row['stu_img'];
									$n_img = str_replace('..', '.', $stu_img);?>
									<div class="testi-in">
											<div class="testi-in-content">
												<p><?php echo $row['f_content'];?></p>
											</div>
											<div class="testi-in-image">
												<img src="<?php echo $n_img; ?>" alt="">
												<h2><?php echo $row['stu_name']; ?>
												<br>
												<span><?php echo $row['stu_occ'];?></span>
												</h2>
											</div>
										</div>'
										<?php	}
							}
						?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#testimonial-slider").owlCarousel({
            items: 3,
            navigation: false,
            pagination: true,
            autoPlay: true
        });
    });
    </script>
</body>

</html>