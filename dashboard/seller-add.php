<?php include 'config.php';
include('session.php');

$msg = '';
if (isset($_POST["submit"])) {

    $name = strip_tags($_POST['name']);

    $number = strip_tags($_POST['number']);
    $email = strip_tags($_POST['email']);
    $address = strip_tags($_POST['address']);


    $rt = "INSERT INTO `tbl_seller`( `user_name`, `user_mobile`, `user_email` , `address`) VALUES ('$name','$number','$email' ,'$address')";
    $result = mysqli_query($con, $rt);

    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
        Seller Added Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">
           Something went wrong. Please try again later 
          </div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Shubham Property: Buy/Sale/Rent Top Residential, Commercial Properties in India</title>
    <?php include 'header-link.php'; ?>
</head>
<body class="skin-megna fixed-layout">
    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <!--<h4 class="text-themecolor">Seller</h4>-->
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Add Seller</li>
                            </ol>
                            <a href="seller.php" type="button" class="btn btn-info  d-lg-block m-l-15 text-white"> Seller List</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Seller</h4>

                                <p><?= $msg; ?></p>
                                <form class="form-row" method="post" enctype="multipart/form-data">
                                    <div class="row">


                                        <div class="form-group col-md-4">
                                            <label>Seller Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Shaurya Preet" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="preet77@gmail.com" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="number" placeholder="123 456 5847" required>
                                        </div>


                                       <div class="form-group col-md-8">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="522, Kolar Road, Bhopal">
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4">
                                            <br>
                                            <button type="submit" name="submit" class="btn btn-primary text-white">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
</body>

</html>


<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>