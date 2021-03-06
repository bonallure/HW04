<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="loginPage.css">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <title>Homework 4</title>
</head>
<body>
    <h1>Computer Security and Privacy</h1>
    <button onclick="goBack()">Logout</button>
    <h1>Homework 4</h1>
    <h1>Laurent Mwamba</h1>
    <br>
    <div id="loginDiv">
        <?php
        echo "Hello<br>";
        $server= "localhost";
        $username= "root";
        $password = "COSC4343";
        $db_name = "homework";
        $conn = new mysqli($server, $username, $password, $db_name);

        if ($conn -> connect_errno) {
            echo "Connection failed!<br>";
        }
        else{
            echo "Connection success!<br>";
        }

        function validate($data){
                   $data = trim($data);

                   return $data;
        }
        $user_name = validate($_POST['username']);
        // echo "username: ".$user_name."<br>";
        $pass = validate($_POST['password']);
        // echo "password: " . $pass . "<br>";
        $md5_pass = validate(md5($pass));
        // echo "md5(password): " . $md5_pass . "<br>";

        $sql = "SELECT * FROM UserAccounts WHERE username='$user_name' AND password='$md5_pass'";
        $result = $conn -> query($sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // echo "<h2>Test ". $row['username'] ." " .$row['password'] ." </h2><br>";
            if ($row['username'] === $user_name && $row['password'] === $md5_pass) {
                echo "<h2>Welcome $user_name</h2><br>";
                $_SESSION['username'] = $row['username'];
                $_SESSION['clearance'] = $row['clearance'];

                if ($_SESSION['clearance'] === "T"){
                    $images = array("TopSecret.png","Secret.png","Confidential.png","Unclassified.png");
                    foreach($images as $image) {
                        echo '<div id="imageDiv" class="center"><img src="'.$image.'"></div>';
                    }
                }
                if ($_SESSION['clearance'] === "S"){
                    $images = array("Secret.png","Confidential.png","Unclassified.png");
                    foreach ($images as $image) {
                        echo '<div id="imageDiv" class="center"><img src="'.$image.'"></div>';
                    }
                }
                if ($_SESSION['clearance'] === "C"){
                    $images = array("Confidential.png","Unclassified.png");
                    foreach ($images as $image) {
                        echo '<div id="imageDiv" class="center"><img src="'.$image.'"></div>';
                    }
                }
                if ($_SESSION['clearance'] === "U"){
                    $images = array("Unclassified.png");
                    foreach ($images as $image) {
                        echo '<div id="imageDiv" class="center"><img src="'.$image.'"></div>';
                    }
                }
            }
            else{
                echo "Incorrect User name or password<br>";
                exit();
            }
        }
        else{
            echo "Database error<br>";
            exit();
        }
        ?>


    </div>
    <script src="script.js"></script>
</body>
</html>
/*

    session_start();


    if (isset($_POST['username']) && isset($_POST['password'])) {

        }

        $user_name = validate($_POST['username']);
        $pass = validate($_POST['password']);

        if (empty($user_name)) {
            header("Location: index.html?error=User Name is required");
            exit();
        }
        else if(empty($pass)){
            header("Location: index.php?error=Password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM UserAccounts WHERE username='user_name' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['username'] === $user_name && $row['password'] === $pass) {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['user_name'];
                    $_SESSION['userID'] = $row['id'];
                    $_SESSION['clearance'] = $row['clearance'];
                    header("Location: home.php");

                    exit();
                }
                else{
                    header("Location: index.php?error=Incorect User name or password");
                    exit();
                }
            }
            else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }

    }
    else{
        header("Location: index.php");
        exit();
    }
*/
