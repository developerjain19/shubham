<?php include('config.php');
include('session.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="skin-megna fixed-layout">

    <div id="main-wrapper">
        <?php include 'header.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">All Properties </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="property-add.php" type="button" class="btn btn-info d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Add Property</a>


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="ba" id="ba" class="form-control">
                                                <option value="">Select Realtor </option>

                                                <?php
                                                $i = 0;
                                                $agents = "SELECT * FROM tbl_agent";
                                                $associate = mysqli_query($con, $agents);
                                                while ($as = mysqli_fetch_array($associate)) {
                                                    $i = $i + 1;
                                                ?>
                                                    <option value="<?= $as['agent_id'] ?>"> <?= $as['agent_name'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="city" id="city" class="form-control">
                                                <option value="">Select Area</option>

                                                <?php
                                                $qe = mysqli_query($con, "SELECT * FROM `tbl_areas` ORDER BY `area_id` ASC");
                                                while ($ci = mysqli_fetch_array($qe)) {
                                                ?>
                                                    <option value="<?= $ci['area'] ?>"><?= $ci['area'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="lowest_price" id="lowest_price" placeholder="Minimum Price">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="highest_price" id="highest_price" placeholder="Maximum Price">
                                        </div>

                                        <div class="col-md-2">
                                            <button type="button" id="find" class="btn btn-primary text-white">Submit</button>
                                        </div>
                                </form>


                            </div>

                        </div>


                    </div>
                </div>

                <div id="data"></div>




            </div>
        </div>
    </div>


    <?php include 'footer.php'; ?>
    </div>
    <?php include 'footer-link.php'; ?>
    <script>
        $('#find').click(function() {

            findlead();

        });

        function myFunction() {

            window.alert('Please Select Seller for property Add');
            window.location.href = 'seller.php';

        }

        function findlead() {
            var city = $('#city').val();
            var ba = $('#ba').val();
            var lowest_price = $('#lowest_price').val();
            var highest_price = $('#highest_price').val();

            $.ajax({
                url: "ajax/property-filter.php",
                method: "POST",
                data: {

                    city: city,
                    agent: ba,
                    lowest_price: lowest_price,
                    highest_price: highest_price
                },
                success: function(data) {
                    // console.log(data);
                    $('#data').html(data);
                    //location.reload();

                }
            });
        }
        findlead();

        $(document).on('click', '.upload', function() {
            var sid = $(this).data('id');
            var status = $('#status' + sid).val();
            var featured = $('input[name="featured' + sid + '"]:checked').val();
            var approval = $('input[name="approval' + sid + '"]:checked').val();
            var popular = $('input[name="popular' + sid + '"]:checked').val();


            $.ajax({
                url: "ajax/property-status-update.php",
                method: "POST",
                data: {
                    status: status,
                    approval: approval,
                    featured: featured,
                    popular: popular,
                    sid: sid
                },
                success: function(data) {
                    console.log(data);
                    location.reload();

                }
            });
        });
    </script>



</body>

</html>