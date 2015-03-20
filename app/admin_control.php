<?php  
    $sql = 'select * from paginas order by titulo';
    $stmt = $conn->prepare($sql);    
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);    
?>
<div class="row titulo-admin">
    <div class="col-md-10">
        <h2>Adminstrar Páginas do Site</h2>        
    </div>  
    <div class="col-md-2 text-right">
      <a href="/logout" class="btn btn-danger" role="button">Logout</a>
    </div>
</div>    
<hr>
<div class="row">
    <?php
    reset($res);
    foreach ($res as $pagina)
    {
     $conteudo_pagina = $pagina['conteudo_pesquisa'];
     if(strlen($conteudo_pagina) > 200)
     {
         $conteudo_pagina = substr($conteudo_pagina,0,200) . '...';
     }                
      echo ' <div class="col-md-4">
    <div id="thumbnail-paginas" class="thumbnail">
      <div class="caption">
        <h3>' . $pagina['titulo'] . '</h3>
        <p>' . $conteudo_pagina . '</p>
        <p><a class="btn btn-primary" href="/editpagina/id/' . $pagina['id'] . '" >Editar</a> <a href="/' . $pagina['descricao'] . '" class="btn btn-default" role="button">Visualizar</a></p>
      </div>
    </div>
  </div>';
    }
    ?>

</div>
