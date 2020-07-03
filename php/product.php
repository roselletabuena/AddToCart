<?php 
    include 'config.php';

    if (!empty($_POST)) {

      $action = $_POST['action'];

        switch ($action) {
            case 'displayProducts':
                $query = 'SELECT * FROM product';
                $stmt = $dbc->query($query);
        
                displayProducts($stmt);
                
                break;

            case 'insertCart': 

                $userID = $_POST['userID'];
                $productID = $_POST['productID'];

                $query = "INSERT INTO cart (user_id, product_id) VALUES (?, ?)";
                $dbc->prepare($query)->execute([$userID, $productID]);

                echo $productID;
                
                break;

            case 'noCartItem': 

                $userID = $_POST['userID'];

                $query = 'SELECT * FROM cart WHERE user_id = '.$userID.''; 
                $result = $dbc->query($query)->fetchAll(); 

                echo count($result); 
        
                break;
        }
        
    }


    function displayProducts($stmt)
    {
        $output = '';
        while ($row = $stmt->fetch()) {
            $output .= '
            
            <div class="col-md-3">

			<div class="card" style="width: 18rem;">

				<img src="img/'.$row["prod_image"].'.jpg" class="card-img-top" alt="...">
	
				<div class="card-body">
	
				  <h5 class="card-title">'.$row["prod_name"].'</h5>
	
				  <p class="card-text">'.$row["prod_price"].'</p>
				
				  <div class="d-flex flex-row-reverse">
					<a class="btn btn-primary text-white add-cart" id="'.$row["id"].'"><i class="fas fa-cart-plus"></i></a>
				  </div>
	
				</div>
	
			</div>

		</div>

            ';
        }

        echo $output;

    }

?>