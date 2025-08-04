<!DOCTYPE html>
<html>
<head>
    <title>Live Product Search</title>
    <style>
     #result-box {
    border: 1px solid #ccc;
    max-height: 300px;
    overflow-y: auto;
    padding: 10px;
    display: none;
}   
        .result-item {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
    </style>
   
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>
<body>
    <h2>Live Product Search</h2>
    <input type="text" id="search-box" placeholder="Search products..." autocomplete="off">
    <div id="result-box"></div>

    <?php
    
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'shopping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{

?>

						
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
	
			
		
		
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
	<?php
}
?>		

    <script>
    $(document).ready(function () {
        $('#search-box').on('keyup', function () {
            let query = $(this).val();
            if (query.length>=1) {
                $.ajax({
                    url: 'search_product.php',
                    method: 'POST',
                    data: { query: query },
                    success: function (data) {
                        $('#result-box').html(data).show();
                    }
                });
            } else {
                $('#result-box').hide().html('');
            }
        });
    });
   
</script>
