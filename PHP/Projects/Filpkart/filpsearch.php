<?php
require('FlipConnection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .Main1{
            width: 100%;
            height: 90px;
            margin-top: 0px;
            background-color: white;
            display: flex;  
            padding-top: 10px;
            justify-content: space-evenly;
            border-radius: 5px;
        }
        #liveSearch {
            padding-left: 150px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 170px;
            align-content: center;
            border-radius: 10px;
            margin-top: 15px;
            margin-left: 80px;
            background-color: rgb(230, 239, 241);  
        }
        #login{
            margin-top: 17px;
            margin-left: 150px;
            padding: 5px;
            border: none;
            font-size: 23px;
            padding-right: 0px;
            font-family: 'Times New Roman', Times, serif;
        }
        .d3{
            padding-right: 70px;   
        }
        .d4{
            padding-top: 23px;
            padding-right: 70px; 
        }
        .fa-cart-shopping{
            background-color:white;
            padding:0px;
            color:black;
            font-size:30px;
        }
        #cart{
            text-decoration: none;
            font-size: 23px;
            color: black;
        }
        .d5{
            padding-top: 23px;
        }
        #bseller{
            text-decoration:none;
            font-size: 23px;
            color: black;
        }
        .Main2{
            margin-top: 10px;
            width: 100%;
            height: 160px;
            background-color: white;
            display: flex;
            justify-content: space-evenly;
            padding-top: 10px;
            border-radius: 5px;
        }
        #kilos{
            padding-left: 25px;
            text-decoration: none;
            color: black;
            font-size: 17px;
        }
        #fashion,#electronics,#home,#beauty,#bike{
            border: none;
            font-size: 17px;
            font-family: 'Times New Roman', Times, serif;
        }
        .Main3{
            margin-top: 10px; 
            width: 100%;
            height: 260px;
            padding-top: 10px;
            background-color: white;
            border-radius: 5px;
        }
        .Main4{
            margin-top: 10px; 
            width: 100%;
            min-height: 260px;
            padding-top: 10px;
            background-color: white;
            border-radius: 5px;
        }
        .Sub1Main4
        {
            text-align:center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 40px;
            font-weight: bolder;
            color: black;
        }
        .Sub2Main4{
            display: flex;
            justify-content: space-evenly;
            padding-bottom:15px;
            flex-wrap: wrap;
            gap: 20px;
        }
        .d16{
            box-shadow: 0 0 40px rgba(39, 32, 32, 0.15);
            border-radius:10px;
            font-size:21px;
            padding:20px;
            width: 180px;
            text-align: center;
        }
        #dis{
            text-decoration:none;
        }
        #product{
            border-radius:10px;
        }
        #ele1{
            text-decoration: none;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            color: black;
            padding-right: 0px;
        }
        #ele2{
            text-decoration: none;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            color: black;
            font-weight: bolder;
            padding-left: 30px;
        }
        a{
            color:black;
        }
        .Main5{
            margin-top: 10px; 
            width: 100%;
            height: 320px;
            padding-top: 0px;
            background-color: white;
            display: flex;
            flex-direction:column;
            justify-content: space-evenly;
        }

        /* New styles for AJAX results */
        #result {
            margin-top: 20px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            min-height: 150px;
        }
        .result-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .result-item:last-child {
            border-bottom: none;
        }
        .result-item img {
            border-radius: 10px;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .result-item div {
            text-align: left;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color: rgb(240, 231, 231)">
    <div class="Main1">
        <div class="d1">
            <img src="Img/Screenshot 2025-06-18 090927.png" width="130px" height="70px" alt="Logo">
        </div>
        <div class="d2">
            <form id="searchForm" action="" method="post" onsubmit="return false;">
                <input type="text" placeholder="Search for Products, Brand and More" size="40px" id="liveSearch" name="search">
                <input type="submit" name="button" value="Search" onclick="$('#liveSearch').trigger('keyup')">
            </form>
            <!-- AJAX search results container -->
            <div id="result"></div>
        </div>
        <div class="d3">
            <select id="login" onchange="window.location.href=this.value">
                <option value="Userlogin.php">Login</option>
                <option value="Myprofile.php">My Profile</option>
                <option value="ViewOrders.php">Orders</option>
                <option value="ViewWishlist.php">Wishlist</option>
                <option value="Userlogout.php">Logout</option>
            </select>  
        </div>

        <?php
        if(isset($_SESSION['Id'])) {
            $id = $_SESSION['Id'];
            $sql = "SELECT * FROM cart WHERE UserId=$id";
            $resultCart = mysqli_query($conn, $sql);
            $r = mysqli_num_rows($resultCart);
        ?>
        <div class="d4">
            <a href="ViewCart.php"><i class="fa-solid fa-cart-shopping" id="c1"><sup style="color:black"><?php echo $r; ?></sup></i></a>
        </div>
        <?php 
        } else { ?>
        <div class="d4">
            <a href="ViewCart.php"><i class="fa-solid fa-cart-shopping" id="c1"></i></a>
        </div>
        <?php } ?>

        <div class="d5">
            <a href="#" id="bseller">
            <?php 
            if(isset($_SESSION['Username'])) {
                echo "Welcome " . $_SESSION['Username'];
            } else {
                echo "Welcome To Website";
            }
            ?>
            </a>  
        </div>
    </div>

    <div class="Main2">
        <!-- Your categories -->
        <div class="d6">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 091100.png" width="90px" height="90px" id="resources"><br>Kilos</a>
        </div>
        <div class="d7">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 092322.png" width="90px" height="90px" id="resources"><br>Mobiles</a>
        </div>
        <div class="d8">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 092330.png" width="90px" height="90px" id="resources"><br>Fashion</a>
        </div>
        <div class="d9">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 092406.png" width="90px" height="90px" id="resources"><br>Electronics</a>
        </div>
        <div class="d10">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 092418.png" width="90px" height="90px" id="resources"><br>Home</a>
        </div>
        <div class="d11">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 092425.png" width="90px" height="90px" id="resources"><br>Beauty</a>
        </div>
        <div class="d12">
            <a href="#" id="kilos"><img src="Img/Screenshot 2025-06-23 092431.png" width="90px" height="90px" id="resources"><br>Bike</a>
        </div>
    </div>

    <!-- Your other page content here -->

    <script>
    $(document).ready(function(){
        $('#liveSearch').on("keyup", function(){
            const query = $(this).val();
            if (query !== "") {
                $.ajax({
                    url: "search_filp_mysql.php",
                    method: "POST",
                    data: { query: query },
                    success: function(data) {
                        $('#result').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        $('#result').html("<div class='result-item'>AJAX error occurred.</div>");
                    }
                });
            } else {
                $('#result').html("");
            }
        });
    });
    </script>
</body>
</html>
<?php
require('FlipConnection.php');

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($conn, $_POST['query']);
    $sql = "SELECT * FROM product WHERE Pname LIKE '%$search%' OR Pdesc LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($n = mysqli_fetch_assoc($result)) {
            $i = $n['Pid'];
            $name = $n['Pname'];
            $desc = $n['Pdesc'];
            $price = $n['Price'];
            $stock = $n['Stock'];
            $image = $n['Image'];

            echo "<div class='result-item'>";
            echo "<a href='UserDesc.php?id=" . htmlentities($i) . "'>";
            echo "<img src='$image' alt='$name'>";
            echo "</a>";
            echo "<div>";
            echo "<strong>$name</strong><br>";
            echo "$desc<br>";
            echo "$price Rs.<br>";
            echo "Available: $stock";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='result-item'>No results found for '" . htmlentities($search) . "'</div>";
    }
} else {
    echo "<div class='result-item'>Please enter a search term.</div>";
}
?>
