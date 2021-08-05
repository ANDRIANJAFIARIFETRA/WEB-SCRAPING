<?php
require '../../config/modules.php';

if (getSession("error")) {
    $message->error(getSession("error"));
    clearSession("error");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Authentification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body background="../../assets/images/login_bakground.jpeg">
<div class="container">



    <div class="rounded-circle" style="background-color: #fff; ">
    </div>    
    <div class="modal-dialog">
            <div class="modal-content">  
                <div class="modal-header text-center">
                    <div class="col-12">
                        <div class="user-img" style="margin-bottom: 10px;"><img src="../../assets/images/user.png"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $dir->controller("loginController.php"); ?>" method="POST">
                        <div class="text-center">
                            
                            <div class="input-icone">
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                                    <i class="fa fa-user fa-lg fa-fw" ></i>
                                </div>
                               
                            </div>

                            <div class="input-icone">
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Mot de passe" required>
                                    <i class="fa fa-key fa-lg fa-fw" ></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Connexion &nbsp;
                                    <i class="fas fa-sign-in-alt "></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
    </div>
  
    
</div>
</body>
</html>
