<?php
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");
include("Head.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
    <style>
        /* General styling for body */
        body {
            background-color: #121212; /* Dark background */
            color: #ffffff; /* Light text color */
            padding:90px;
            margin-left:-90px;
            margin-top: 10px

        }

        /* General styling for alert box */
        .custom-alert-box {
            z-index: 1;
            width: auto;
            position: fixed;
            top:100px;
            bottom: 20px;
            right: 20px;
        }

        /* Success, failure, warning alert boxes */
        .alert {
            display: none;
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 25px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8; /* Light green background */
            border-color: #d6e9c6; /* Light green border */
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede; /* Light red background */
            border-color: #ebccd1; /* Light red border */
        }

        .alert-warning {
            color: #8a6d3b;
            background-color: #fcf8e3; /* Light yellow background */
            border-color: #faebcc; /* Light yellow border */
        }

        /* Adjustments for filter layout */
        .filter-section {
            padding: 30px 20px;
            border: 1px solid red; /* Light border */
            border-radius: 20px;
            margin-top: 20px; /* Space above the filter section */
            background-color: #1e1e1e; /* Dark filter background */
        }

        .form-check {
            margin-bottom: 5px; /* Add spacing between checkboxes */
            
        }

        .list-group-item {
            padding: 12px 10px; /* Adjust padding for checkboxes */
            background-color: #2a2a2a; /* Dark item background */
            border-color: #444; /* Dark border */
            color: #ffffff; /* Light text color for items */
        }

        /* Loader style */
        #loader {
            display: none;
        }

        /* Button style */
        .view-cart-button {
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary button color */
            border-color: #007bff; /* Border color */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
            border-color: #004085; /* Darker border on hover */
        }

    .stylish-textbox {
            width: 100%;
            padding: 10px;
            border: 2px solid red; /* Border color */
            border-radius: 8px; /* Rounded corners */
            font-size: 16px; /* Text size */
            color: white; /* Text color */
            background-color: #121212; /* Background color */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
        }

        .stylish-textbox:focus {
            border-color: red; /* Darker blue on focus */
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2); /* Enhanced shadow on focus */
            outline: none; /* Remove default outline */
            background-color: #121212; /* White background on focus */
        }

        .stylish-textbox::placeholder {
            color: #888; /* Placeholder text color */
            font-style: italic; /* Italicize placeholder */
        }

    </style>
</head>

<body onload="productCheck()">
    <div class="custom-alert-box">
        <div class="alert alert-success">Successfully Added to Cart!</div>
        <div class="alert alert-danger">Failed to Add to Cart!</div>
        <div class="alert alert-warning">Already Added to Cart!</div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 filter-section">
                <h5>Filter Products</h5>
                <hr>
                    <h6 class="text-info">Search by Product Name</h6>
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" class="product_check stylish-textbox" id="txt_name">
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                <hr>

                <h6 class="text-info">Select Type</h6>
                <ul class="list-group">
                    <?php
                    $seltype = "SELECT * from tbl_type";
                    $result = $conn->query($seltype);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" id="type" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["type_id"]; ?>"><?php echo $row["type_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <h6 class="text-info">Select Category</h6>
                <ul class="list-group">
                    <?php
                    $selCat = "SELECT * from tbl_category";
                    $result = $conn->query($selCat);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" id="category" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <h6 class="text-info">Select Sub Category</h6>
                <ul class="list-group" id="subcat">
                    <?php
                    $selSubCat = "SELECT * from tbl_subcategory";
                    $resultsc = $conn->query($selSubCat);
                    while ($rowsc = $resultsc->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" id="subcategory" onchange="productCheck()" class="form-check-input product_check" value="<?php echo $rowsc["subCategory_id"]; ?>"><?php echo $rowsc["subCategory_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-lg-9">
                <h5 class="text-center" id="textChange">All Products</h5>
                <div class="view-cart-button text-center">
                    <a href="MyCart.php" class="btn btn-primary">View Cart</a>
                </div>
                <hr>
                <div class="text-center">
                    <img src="../Assets/Templates/Search/loader.gif" id="loader" width="200" />
                </div>
                <div class="row" id="result"></div>
            </div>
        </div>
    </div>

    <script src="../Assets/Templates/Search/jquery.min.js"></script>
    <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
    <script src="../Assets/Templates/Search/popper.min.js"></script>
    <script>
        function changeSub() {
            var cat = get_filter_text('category');
            if (cat.length !== 0) {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxSearchSubCat.php?data=" + cat,
                    success: function(response) {
                        $("#subcat").html(response);
                    }
                });
            } else {
                $("#subcat").html("");
            }
        }

        function addCart(id) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                success: function(response) {
                    if (response.trim() === "Added to Cart") {
                        $(".alert-success").fadeIn(300).delay(1500).fadeOut(400);
                    } else if (response.trim() === "Already Added to Cart") {
                        $(".alert-warning").fadeIn(300).delay(1500).fadeOut(400);
                    } else {
                        $(".alert-danger").fadeIn(300).delay(1500).fadeOut(400);
                    }
                }
            });
        }

        function productCheck() {
            $("#loader").show();

            var action = 'data';
            var category = get_filter_text('category');
            var subcategory = get_filter_text('subcategory');
            var brand = get_filter_text('brand');
            var type = get_filter_text('type');
            var name = document.getElementById('txt_name').value;

            $.ajax({
                url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action + "&category=" + category + "&subcategory=" + subcategory + "&brand=" + brand + "&type=" + type + "&name=" + name,
                success: function(response) {
                    $("#result").html(response);
                    $("#loader").hide();
                    $("#textChange").text("Filtered Products");
                }
            });
        }

        function get_filter_text(text_id) {
            var filterData = [];
            $('#' + text_id + ':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }
    </script>
</body>
<?php
include("Foot.php");
?>
</html>
