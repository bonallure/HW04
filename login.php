
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
echo "username: ".$user_name."<br>";
$pass = validate($_POST['password']);
echo "password: " . $pass . "<br>";

$sql = "SELECT * FROM UserAccounts WHERE username='$user_name' AND password='$pass'";
$result = mysqli_query($conn, $sql);
echo $result . "<br>";
?>
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
