<?php
// now we must start the sessions
    session_start();
    // connection to the database is necessary
    include_once("database.php");
    // connect the database
    $sql_con=configuration::connection_database();

    // login panel or check the login
    if (isset($_POST['logged_adm'])) {
        // gets the mail and password of the login panel
        $mailed_part_of_admin= $_POST['mailing_the_admin'];
        $pass_part_of_admin=$_POST['pass_the_admin'];

        // verify the admin
        if (adminlog($sql_con,$mailed_part_of_admin,$pass_part_of_admin)) {

            $_SESSION["uNameAdmin"] = $mailed_part_of_admin;
            header("Location:adminCategories.php");
        }

    }

    // function to check the admin
    function adminlog($dbcon,$mailed_part_of_admin,$pass_part_of_admin){
        $con=$dbcon->prepare("SELECT adminName,passcodeAdmin FROM admin WHERE adminName=? AND passcodeAdmin=?");
        $con->execute([$mailed_part_of_admin,$pass_part_of_admin]);

        return $con;
    }

    // here we get the adding of category
    if (isset($_POST['plusCat'])) {
        $enterCategoryName = $_POST['EnterCategoryName'];// gets the category name entered by admin
    
        //addCategory function to add the category
        if(addCategory($sql_con,$enterCategoryName)){
            header("Location:addCategory.php");// headed to another page
        }
    }
    
    // function to insert the category
    function addCategory($connection,$enterCategoryName){
        // query to insert into the category section in database
        $sql=$connection->prepare("
            INSERT INTO category(categoryName) VALUES(?)");
    
        return $sql->execute([$enterCategoryName]);
    }

    // updation is necessary 
    if (isset($_POST['upBtn'])) {
        
        // gets the parameter
        $ed_id = $_POST['up_cv_id'];
        $ed=$_POST['up_cv']; 

        // called the function
        if(categoryUpdation($sql_con,$ed_id,$ed)){
            header("Location:adminCategories.php");	
        }
    }
    
    // function called to update the catagory
    function categoryUpdation($connect,$ed_id,$ed){
        $sql=$connect->prepare("
            UPDATE category SET categoryName=? WHERE category_id =? LIMIT 1
            ");
    
        return $sql->execute([$ed,$ed_id]);
    }


    // check the login user
    if(isset($_POST['logged_regUser'])){

        // gets teh parameter
        $um= $_POST['mailing_the_regUser'];
        $un=$_POST['naming_the_regUser'];
        $up=$_POST['pass_the_regUser'];
    
        //we hahve the function to check the login user
        if(additionOfTHeUser($sql_con,$um,$un,$up)){
            header("Location:index.php");// throws in index page
        }
    }


    // function to registeruser
    function additionOfTHeUser($connection,$um,$un,$up){
        $sql= $connection->prepare("
            INSERT INTO Users(userEmail,password,userName) VALUES
            (?,?,?)");
    
        return $sql->execute([$um,$up,$un]);
    
    }


    // check the login user
    if (isset($_POST['ok_user_lo'])) {
        $email = $_POST['mailing_the_user'];
        $password = $_POST['pass_the_user'];
    
        // gets the login parameter and function
        $user = lo($sql_con, $email, $password);
    
        if ($user) {
    
            $_SESSION["username_of_user"] = $email;
    
            // gets the details from database
            $db_query = $sql_con->prepare("SELECT * FROM Users WHERE userEmail = :userEmail LIMIT 1");
            $params = ['userEmail' => $email];
            $db_query->execute($params);
    
            $user_data = $db_query->fetch(PDO::FETCH_OBJ);
    
            $_SESSION["loginUserKoName"] = $user_data->userName;
            $_SESSION["loginUserKoid"] = $user_data->userId;
    
            header("Location: index.php");
            exit(); 
        } else {
            echo "Invalid username or password"; // Display an error message
        }
    }
    
    // Function to check the user login credentials
    function lo($dbcon, $email, $password) {
        $sql = $dbcon->prepare("SELECT userEmail FROM Users WHERE userEmail = ? AND password = ?");
        $sql->execute([$email, $password]);
    
        return $sql->fetch(PDO::FETCH_ASSOC); // Return the user if found, otherwise false
    }


    // add the auction
    if (isset($_POST['addAuc'])) {
        // Retrieve form data
        $auction_title = $_POST["auction_title"];
        $descriptionAuction = $_POST["descriptionAuction"];
        $bidAmount = $_POST["bidAmount"];
        $endDate = $_POST["endDate"];
        $categoryId = $_POST["cat_auction"];
        $createdBy = $_SESSION["loginUserKoName"];

        // to avoid the exception
        try {
            // SQL statement to insert data into the "auction" table
            $stmt = $sql_con->prepare("INSERT INTO auction (auction_title, descriptionAuction, bidAmount, endDate, categoryId, createdBy)
                    VALUES (:auction_title, :descriptionAuction, :bidAmount, :endDate, :categoryId, :createdBy)");

            // Bind the form data to SQL parameters
            $stmt->bindParam(':auction_title', $auction_title, PDO::PARAM_STR);
            $stmt->bindParam(':descriptionAuction', $descriptionAuction, PDO::PARAM_STR);
            $stmt->bindParam(':bidAmount', $bidAmount, PDO::PARAM_STR);
            $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':createdBy', $createdBy, PDO::PARAM_STR);

            // Execute the SQL statement
            $stmt->execute();

            echo "Auction created successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // to update the auction
        if (isset($_POST['updateAuctionPart'])) {
            // Retrieve form data
            $auction_id = $_POST["auction_id"];
            $auction_title_update = $_POST["auction_title_update"];
            $descriptionAuction_update = $_POST["descriptionAuction_update"];
            $bidAmount_update = $_POST["bidAmount_update"];
            $endDate_update = $_POST["endDate_update"];
            $cat_auction_update = $_POST["cat_auction_update"];
            $createdBy = $_SESSION["loginUserKoName"]; // Added createdBy field

            // to avoid the exception
            try {
                $sql = "UPDATE auction 
                SET auction_title = :auction_title, 
                    descriptionAuction = :descriptionAuction, 
                    bidAmount = :bidAmount, 
                    endDate = :endDate, 
                    categoryId = :categoryId, 
                    createdBy = :createdBy 
                WHERE auction_id = :auction_id"; // Use a WHERE clause to specify which record to update

            // Prepare the SQL statement
            $stmt = $sql_con->prepare($sql);

            // Bind the form data to SQL parameters
            $stmt->bindParam(':auction_title', $auction_title_update, PDO::PARAM_STR);
            $stmt->bindParam(':descriptionAuction', $descriptionAuction_update, PDO::PARAM_STR);
            $stmt->bindParam(':bidAmount', $bidAmount_update, PDO::PARAM_STR);
            $stmt->bindParam(':endDate', $endDate_update, PDO::PARAM_STR);
            $stmt->bindParam(':categoryId', $cat_auction_update, PDO::PARAM_INT);
            $stmt->bindParam(':createdBy', $createdBy, PDO::PARAM_STR);

            // You also need to specify the auction_id to identify which record to update
            $stmt->bindParam(':auction_id', $auction_id, PDO::PARAM_INT);

            // Execute the SQL statement
            $stmt->execute();


                echo "Auction updated successfully!";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } 


?>