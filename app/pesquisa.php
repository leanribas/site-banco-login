<h3>Resultado da Pesquisa</h3>
<?php
  
  $sql = 'select * from paginas where conteudo_pesquisa like ?';
  $stmt = $conn->prepare($sql);
  $param = ['%'.$_POST['search'].'%'];
  $stmt->execute($param);
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $_POST['search'] = strip_tags($_POST['search']);
  if(count($res) == 0)
  {
    echo '<strong>Nenhum resultado encontrado para o termo : ' . $_POST['search'] . '</strong>';
  }
  else
  {
    $qtd = count($res);
    $plural = '';
    if($qtd > 1)
    {
        $plural = 's';
    }    
    echo '<strong>'.count($res).'</strong> resultado'.$plural.' encontrado'.$plural.' com o termo <strong>' . $_POST['search'] . '</strong>';
  }
  foreach ($res as $conteudo)
  {
    $conteudo_pagina = $conteudo['conteudo_pesquisa'];
    if(strlen($conteudo_pagina) > 500)
    {
        $conteudo_pagina = substr($conteudo_pagina,0,500) . '...';
    }    
    echo '<div class="search-result-item">
        <h4><a href="/'.$conteudo['descricao'].'">' . $conteudo['titulo'] . '</a></h4>
        <p>' . $conteudo_pagina . '</p>
        <a class="search-link" href="/'.$conteudo['descricao'].'">Mais Detalhes</a>
    </div>';      
  }    
?>

