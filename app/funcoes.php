<?php

function validaRota($conn,$paginasFixas)
{    
    $url = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
    if($url['path'] == '/')
    {
        return 'home';
    }    
    
    $pathExplode = explode('/', $url['path']);
    $page = $pathExplode[1];    
    if(!paginaExiste($page,$conn,$paginasFixas))
    {
      header('HTTP/1.0 404 Not Found');
      return 'notfound';
    }
    else
    {
      return $page;    
    }
}

function paginaExiste($pagina,$conn,$paginasFixas)
{   
    if(in_array($pagina, $paginasFixas))
    {
        return true;
    }        

    $sql = 'select count(id) as qtd from paginas where descricao = :descricao';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('descricao',$pagina);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res['qtd'] > 0;
    
}

function conteudoPagina($pagina,$conn,$paginasFixas)
{
    if(in_array($pagina, $paginasFixas))
    {
        require_once($pagina.'.php');
        return'';
    }    
    $conteudo = '';
    $sql = 'select id, conteudo from paginas where descricao = :descricao';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('descricao',$pagina);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);    
    if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1){
        $conteudo = '<div class="row"><div class="col-md-12 text-right">'
                    . '<a href="/editpagina/id/'
                    . $res['id']
                    . '" class="btn btn-primary" role="button">Editar</a>'
                    . ' <a href="/logout" class="btn btn-danger" role="button">Logout</a>'
                    . '</div></div>';
    }
    return $conteudo . $res['conteudo'];    
}