 <?php
 require_once("includes/header.php");
 $name=''; $email=''; $password=''; $confirm_password='';
 $errors=array("name"=>"","email"=>"", "password"=>"", "confirm_password"=>"");
    $success='';

 if(isset($_POST['submit'])){

    //Name Validation
    $name=htmlspecialchars($_POST['name']);
    if(empty($name)){
            // if there is no data
            $errors["name"]= "Invalid! Please enter a name!";
           
    }else{
            // if there is data
            //validation continued
            if(preg_match("/[^a-zA-z\s]/", $name, $result)){
                $errors['name']= "Invalid! Please enter only alpha and spaces";
            }
    }

    //Email Validation
    $email=htmlspecialchars($_POST['email']);
    if(empty($email)){
        // if there is no data
        $errors['email']= "Invalid! Please enter a email id!";
       
    }else{
        // if there is data
        //validation continued
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email']= "Invalid! Please enter a valid email id";
        }
    }

    //Password Validation
    $password=htmlspecialchars($_POST['password']);
    if(empty($password)){
            // if there is no data
            $errors['password']= "Invalid! Please enter a password!";
           
    }else{
            // if there is data
            //validation continued
            if (strlen($password) < 8){
                $errors['password']= "too short";
            }else if(!preg_match('/\d/', $password)){
                $errors['password']= "must contain a digit";
            }else if (!preg_match('/[^A-Za-z0-9]/', $password)){
                $errors['password']= "must contain a special character";
            }else{
                $confirm_password=htmlspecialchars($_POST['re_password']);
                if(empty($confirm_password)){
                    $errors['confirm_password']= "Invalid! Enter confirm password!";
                }else if($password===$confirm_password){
                    $success= "All fields are valid";
                }else{
                    $errors['confirm_password']= "Invalid! Passwords don't match!";
                }
            }

            // if(preg_match("/[\s]/",$password)){
            //     //should not contain white space
            //     echo "contains space";
            // }else{
            //     echo "its good!";
            // }

    }
 }

 ?>
 
 <div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                     <div>
                        <?php echo $success ?>
                    </div>
                    <form id="signup-form" class="signup-form" method="post" action="index.php">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" value="<?php echo $name?>" placeholder="Your Name"/>
                        </div>
                        <div>
                        <?php echo $errors["name"] ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div>
                        <?php echo $errors["email"] ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div>
                        <?php echo $errors["password"] ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div>
                        <?php echo $errors["confirm_password"] ?>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" <?php if (isset($_POST['agree-term'])) echo "checked"?>/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>

<?php
 require("includes/footer.php");
 ?>