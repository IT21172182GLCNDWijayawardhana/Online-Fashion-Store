<?php    
$cnect = mysqli_connect("localhost","root","","online fashion store");
 if (isset($_GET['item_ID'])) {  
      $id = $_GET['item_ID'];  
      $query2 = "DELETE FROM `item` WHERE item_ID = '$id'";  
      $run = mysqli_query($cnect,$query2);  
      if ($run) {  
           header('location:viewitems.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?>  

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View and Update Items</title>
	 <link rel="stylesheet" href="../css/item.css"/>
	 <link rel="stylesheet" href="../css/main.css" />
	 <link rel="stylesheet" href="../others/icons/css/all.css"/> 
	 
	<style>
		table{
			border-collapse : collapse;
			margin : 10px 500px;
			min-width: 500px;
			border-radius: 5px 5px 0 0;
			overflow : hidden;
			font-size: 20px;
			box-shadow : 0 0 20px rgba(0, 0, 0, 0.15);
		}
		table td{
			background-color : #b3b3ff;
			color : #000;
		}
		table th{
			background-color : #d154ff;
			color : #000000;
			text-align : left;
			font-weight : bold;
		}
		table th, table td{
			padding : 12px 15px;
		}
	</style>
</head>

<body>
<nav class="sidebar close">
     <header>
        <div class="image-text">
            <span class="image">
                <img src="../images/logo.png" alt="LOGO">
            </span>

                <div class="text logo-text">
                    <span class="name">Miss Fashion</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                  
                    <li class="nav-link">
                        <a href="dashboard.php">
                            <i class="fa-brands fa-sketch"></i>
							<i></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
					
					<li class="nav-link">
                        <a href="AdminPanal.php">
                            <i class="fa-solid fa-user"> </i>
                            <span class="text nav-text"> Admin Panal</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="RegisterForm.php">
							<i class="fa-solid fa-registered"></i>
                            <span class="text nav-text">Register</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="AddItems.php">
                            <i class="fa-solid fa-images"></i>
                            <span class="text nav-text">Update Images</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="viewItems.php">
                            <i class="fa-solid fa-image"></i>
                            <span class="text nav-text">Display Images</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
						<i class="fa-solid fa-right-from-bracket"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>

<section class="home">
<center>
	<h1>Update Data</h1>
	
	<?php
		
		
		$id=$_GET['DressID'];
		$query ="SELECT * FROM item WHERE itemID=$id";
		$query_run = mysqli_query($cnect,$query);
		
		if(mysqli_num_rows($query_run)>0){
			foreach($query_run as $row){
				echo "Dress Code No : ";
				echo $row['itemID'];
		?>
			<form action="" method="post" enctype = "multipart/form-data" >
			<input type ="hidden" name= "Dress Code " value= "<?php echo $row['itemID']; ?>">
			<table border =1>
				<thead>
				<tr>
					<th>Title </th>
					<th>New Data </th>
				</tr>
				</thead>

				<tr>
					<th><label for="i_name">Item Name </label></th>
					<td><input type="text" name="i_name" value="<?php echo $row['itemName']; ?>" required placeholder="Item Name"></td>
				</tr>
				
				<tr>
					<th><label for="category">Category </label></th>
					<td><input type="text" name="category" value="<?php echo $row['category']; ?>" required placeholder="Men, Women, Kids"></td>
				</tr>
						
				<tr>
					<th><label for="i_desc">Item Description </label></th>
					<td><input type="text" name="i_desc" value="<?php echo $row['itemDesc']; ?>" required placeholder="Item Description"></td>
				</tr>
								
										
				<tr>
					<th><label for="img">Upload Image </label></th>
					<td><input type ="file" name ="img" accept=".jpg, .jpeg">
					<input type ="hidden" value = "value="<?php echo $row['image']; ?> name ="Old-img" accept=".jpg, .jpeg">
					
					</td>
				</tr>
								
				<tr>
					<th><label for="color">Available Colors </label></th>
						<td><input type="text" name="color" value="<?php echo $row['availableColors']; ?>" required placeholder="Dress Color"></td>
				</tr>
								
				<tr>
					
					<th><label for="size">Available Size </label></th>
					<td><input type="text" name="size" value="<?php echo $row['availableSize']; ?>" required placeholder="Dress Sizes"></td>
					
				</tr>
					</td>
				</tr>
								
				<tr>
					<th><label for="price">Dress Price </label></th>
					<td><input type="text" name="price" value="<?php echo $row['price']; ?>" required placeholder="Dress Price"></td>
					
				</tr>
								
				<tr>
					<th><label for="discount">Discount </label></th>
					<td><input type="text" name="discount" value="<?php echo $row['discount']; ?>"required placeholder="Dress Price"></td>
				</tr>
								
				<tr class ="btn">
					<th><a href='delete.php?id=".$result['id']."' id='btn'>Delete</a></td></th>
				<div class="inputBox">
					<th><input type="submit" name="Update" value="Submit"></th>
				</div>
				</tr>
			</table>
		</form>	
				
			<?php
				
				
			}
		}
		else{
			echo "No record Available";
		}
	?>
		
	</center>
</section>

   <script>
        const body = document.querySelector('body'),
		sidebar = body.querySelector('nav'),
		toggle = body.querySelector(".toggle"),
		searchBtn = body.querySelector(".search-box"),
		modeSwitch = body.querySelector(".toggle-switch"),
		modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

</script>

</body>
</html>