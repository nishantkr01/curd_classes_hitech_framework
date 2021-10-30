<?php

require_once("../dbconnect.php");

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $message = $_POST['message'];
    $id = $_POST['id'];

    include_once("../classes/clsRegistrationManager.php");
    $objRegistrationManager = new clsRegistrationManager();
    $objRegistration = new clsRegistration();

    $objRegistration->setFirstName($firstName);
    $objRegistration->setLastName($lastName);
    $objRegistration->setEmail($email);
    $objRegistration->setPhone($phone);
    $objRegistration->setCity($city);
    $objRegistration->setMessage($message);


    if ($id == "") {
        $saveFlag = $objRegistrationManager->SaveRegistration($objRegistration);

        if ($saveFlag > 0) {
?>
            <script>
                alert("Registerd Successfully");

                window.location.href = "studentDetails.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Registration Failed");
            </script>
        <?php
        }
    } else if ($id !== "") {
        $objRegistration->setId($id);
        $saveFlag = $objRegistrationManager->UpdateRegistration($objRegistration);
        if ($saveFlag > 0) {
        ?>
            <script>
                alert("Updated Successfully");

                window.location.href = "studentDetails.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Updated Failed");
            </script>
<?php
        }
    }
} else if (isset($_GET['id'])) {
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $city = $_GET['city'];
    $message = $_GET['message'];
    $id = $_GET['id'];
} else {
    $firstName = "";
    $lastName = "";
    $email = "";
    $phone = "";
    $city = "";
    $message = "";
    $id = "";
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <noscript><h3> You must have JavaScript enabled in order to use this order form. Please 
      enable JavaScript and then reload this page in order to continue. </h3> 
      <meta HTTP-EQUIV="refresh" content=0;url="registration.php"></noscript>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: rgb(0, 69, 116);
        }

        .custom-j {
            width: 50%;
            margin: auto;
        }

        .button {
            padding: 3px 30px 3px 30px;
            background-color: green;
            border-color: green;
            color: white;
            cursor: pointer;
        }

        @media screen and (max-width: 1300px) {
            .custom-j {
                width: 100% !important;
            }
        }
    </style>
    <title>CONTACT FORM</title>
</head>

<body>


<!-- validation -->
<script>  



function validateform(){  
var firstName=document.myform.firstName.value;  
var lastName=document.myform.lastName.value;  
var email=document.myform.email.value;  
var phone=document.myform.phone.value;  
var city=document.myform.city.value;  
var message=document.myform.message.value;  
 

if (firstName==null || firstName==""){  
  alert("first Name can't be blank"); 

  return false;  
} else if (lastName==null || lastName==""){  
  alert("lastName  can't be blank");  
  return false;  
} else if (email==null || email==""){  
  alert("email can't be blank");  
  return false;  
} else if (phone==null || phone==""){  
  alert("phone can't be blank");  
  return false;  
} else if (city==null || city==""){  
  alert("city Name can't be blank");  
  return false;  
}else if (message==null || message==""){  
  alert("message can't be blank");  
  return false;  
}

}  
</script>
<!-- validation -->



    <div class="container">
        <div class="fs-2 mt-3 text-center text-white">
            SIMPLE REGISTRATION FORM
        </div>
        <div class="mt-4 p-3 bg-white custom-j shadow-lg">
            <a class="nav-link text-dark" href="studentDetails.php">Go to Registration Page</a>
            <form  name="myform" method="post"  onsubmit="return validateform()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div>
                    <label style="color: orangered">FIRST NAME</label><br>
                    <input type="text" name="firstName" class="mt-2 form-control" value="<?php echo $firstName ?>" placeholder="FIRST NAME">
                </div>

                <div class="mt-3">
                    <label style="color: orangered">LAST NAME</label><br>
                    <input type="text" name="lastName" class="mt-2 form-control" value="<?php echo $lastName ?>" placeholder="LAST NAME">
                </div>

                <div class="mt-3">
                    <label style="color: orangered">EMAIL</label><br>
                    <input type="text" name="email" class="mt-2 form-control" value="<?php echo $email ?>" placeholder="EMAIL">
                </div>

                <div class="mt-3">
                    <label style="color: orangered">PHONE NUMBER</label><br>
                    <input type="text" name="phone" class="mt-2 form-control" value="<?php echo $phone ?>" placeholder="PHONE NUMBER">
                </div>

                <div class="mt-3">
                    <label style="color: orangered">CITY</label><br>
                    <input type="text" name="city" class="mt-2 form-control" value="<?php echo $city ?>" placeholder="CITY">
                </div>

                <label style="color: orangered" class="mt-3">Salary</label><br>
                <input type="text" name="message" class="mt-2 form-control" value="<?php echo $message ?>" placeholder="Salary (LPA)">

                <button name="submit" class="button form-control mt-3" type="submit">Send</button>
            </form>
        </div>
    </div>




















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>