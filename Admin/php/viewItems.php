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
			margin : 20px 500px;
			min-width: 200px;
			border-radius: 5px 5px 0 0;
			overflow : hidden;
			font-size: 24px;
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
		<form action="" method="post" enctype = "multipart/form-data" >
			<table>
				<thead>
					<tr>
						<th>Item ID </th>
						<th>Item Name </th>
						<th> Item Category </th>
						<th> Item Description </th>
						
						<th> Available Color(s) </th>
						<th> Available Size </th>
						<th> Item Price </th>
						<th> Discount </th>
						<th>  </th>
						<th>  </th>
					</tr>
				</thead>
				<?php
					$connect = mysqli_connect("localhost","root","","online fashion store");
					
					$query = "SELECT * FROM item ";
					$result = mysqli_query($connect,$query);
					
					while($row = mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $row['itemID']; ?></td>
							<td><?php echo $row['itemName']; ?></td>
							<td><?php echo $row['category']; ?></td>
							<td><?php echo $row['itemDesc']; ?></td>
							
							<td><?php echo $row['availableColors']; ?></td>
							<td><?php echo $row['availableSize']; ?></td>
							<td><?php echo $row['price']; ?></td>
							<td><?php echo $row['discount']; ?></td>
														
							<td><a href="Update.php?DressID=<?php echo $row['itemID']; ?>" class="btn-up">Update</a></td>
											
							<td><a href="delete.php" class="btn-del">Delete</a></td>
						</tr>
						<?php			
					}
					?>
			</table>
		</form>
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
