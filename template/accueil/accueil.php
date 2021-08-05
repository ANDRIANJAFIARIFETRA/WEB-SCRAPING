<?php
require '../../config/modules.php';
$user = getCookie("user");
if ($user) {
    if (decrypt($user)) {
    } else {
        deleteCookie("user");
        routes("/login");
    }
}else{
    routes("/login");

}
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
  
</head>
<script>

    function onEdit(code){

    
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        
            if (this.readyState == 4 && this.status == 200) {
                
                response =  JSON.parse(this.responseText);
                list = response.fils
                document.getElementById('code_site').value =  response.mere.code_site
                document.getElementById('nom_site').value =  response.mere.nom_site
                document.getElementById('url_site').value = response.mere.url_site 
                var list = response.fils
        

                if(document.getElementById('list_url')){

                    var ul = document.getElementById("list_url");
                    ul.parentElement.removeChild(ul);
                }

                var ul = document.createElement('ul');
                ul.setAttribute('id', 'list_url')

                    
                    document.getElementById('list').appendChild(ul)

                    for (i = 0; i < list.length; i++) {
                    
                    var li = document.createElement("li");
                    var a = document.createElement("a");
                    var libelle = document.createTextNode(list[i]);
                    a.setAttribute('href', list[i])
                    a.setAttribute('class', "url");

                    a.appendChild(libelle);
                    li.appendChild(a);
                    document.getElementById("list_url").appendChild(li);

                    }
        

            }
        };
        xhttp.open("GET", `<?php echo $dir->controller('getSiteId.php') ?>?id=${code}` , true);
        xhttp.send();
       

    }

    function deleteSite(code){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText){
                    location.reload();
                }
            }

        };
        xhttp.open("GET", `<?php echo $dir->controller('deleteController.php') ?>?id=${code}` , true);
        xhttp.send(); 
    
    }

    function resetForm(){
        document.getElementById('code_site').value =  null
        document.getElementById('nom_site').value =  null
        document.getElementById('url_site').value = null
        
        if(document.getElementById('list_url')){
            var ul = document.getElementById("list_url");
            ul.parentElement.removeChild(ul);
        }


    }
    

</script>
<body>
    
    <div style="margin-bottom: 65px;">
        <?php include('../navbar/navbar.php');  ?>
    </div>
    <div class="container">

        <h4 style="display: inline-block;">Extraction des Urls dans un page web</h4>

        <button style="display: inline-block; float:right;" class="btn btn-primary btn-sm" onclick="resetForm()">Nouveau <i class="fas fa-plus"></i> </button>

        <hr>

        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div>
                <form action="<?php echo $dir->controller("siteController.php"); ?>" method="POST">
                        
                        <input type="hidden" name="code_site" id="code_site">
                        <label for="nom_site">  <i class="fas fa-globe"></i> &nbsp; Nom du site :</label> <br>
                        <input type="text" name="nom_site" id="nom_site" class="form-control form-control-sm" placeholder="Insérer le nom du site" required>

                        <label for="url_site">  <i class="fas fa-link"></i> &nbsp; Lien :</label> <br>
                        <input type="text" name="url_site" id="url_site" class="form-control form-control-sm" placeholder="Insérer le lien" required> <br>

                        <button type="submit" name="formRegister" class="btn btn-primary btn-sm">
                            Enregistrer &nbsp;  <i class="fas fa-save"></i>
                        </button>

                    </form> 
                </div>
                <hr>
                <h4 >Liste des Urls extractés</h4>
                <div id="list">
                </div>

            </div>
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-sl-8">
                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col">ID </th>
                        <th scope="col">Nom du site</th>
                        <th class="text-center" scope="col"> Lien </th>
                        <th> Action </th>
                    </thead>
                    <tbody >
                       <?php 

                            $sites = $database->select("site", "*");
                            if(isset($sites)){
                                foreach ($sites as $site => $site_val) {
                        ?>
                                <tr>
                                    <td><?php echo $site_val['code_site']?></td>
                                    <td style="width: 250px;"><?php echo $site_val['nom_site']?></td>
                                    <td>
                                        <a class="url" href="<?php echo $site_val['url_site']?>">
                                            <?php echo $site_val['url_site']?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="edit" onclick="onEdit(<?php echo $site_val['code_site']; ?>)"> 
                                            <svg  width="20px" xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </span>
                                        <span class="delete" onclick="deleteSite(<?php echo $site_val['code_site']; ?>)"> 
                                            <svg  width="20px" xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path key={vhcl.code_vehicule + 'path'} strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </span>
                                    </td>
                                </tr>
                        <?php
                                }
                            }

                       ?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</body>


</html>
