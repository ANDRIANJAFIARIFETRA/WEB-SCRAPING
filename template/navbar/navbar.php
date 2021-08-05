
<?php 

    $url = $_SERVER['REQUEST_URI']; 
    $path = explode("/", parse_url($url, PHP_URL_PATH))[2];

?>


<nav class="navbar navbar-expand-lg  navbar-dark bg-dark fixed-top" style="padding-top: 0; padding-bottom:0;">
    <div class="container"> 
    <a class="navbar-brand" href="#"> 
        <img src="../../assets/images/logo.png" style="width: 50px;">
        Scrap-app
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="navigation">
        <div class="navbar-nav ml-auto">
            <a class=" nav-link <?php if($path === 'accueil') echo "active" ?> " tabindex="-1" href="#"> <i class="fa fa-home"></i> &nbsp; Accueil</a>
        
            <a class="nav-link"> <?php echo getSession("user"); ?></a>
            <a class=" nav-link logout" href="<?php  echo $dir->controller('logoutController.php') ?>" > Déconnecter  <i class="fa fa-sign-in-alt"></i>  </a>
        </div>  
    </div>

    </div>
</nav>

<script>


</script>