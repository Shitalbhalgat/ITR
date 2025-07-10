<?php

?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <div class="Main">
                <?php  include('header.php');?>
            <div class="main-container">
                 <div class="Main2"> 
                        <?php  include('sidebar.php');?>
                 </div> 
                <div class="content">
                      <form action="" method="post">
                                <h1>Category Page</h1>
                                <label>Enter The Category:</label>
                                <input type="text" name="cat" id="cat" placeholder="Enter Category Name" required>

                                <label>Enter Description:</label>
                                <textarea rows="5" name="description" id="description" placeholder="Enter Description" required></textarea><br>

                                <input type="submit" value="Submit" name="s1" id="s1">
                                <input type="submit" value="Go Back" name="s2" id="s2">
                        </form>
                 </div>
            </div>
               <?php  include('footer.php');?>

        </div>
    </body>
</html>