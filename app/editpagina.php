<?php  

    $params = explode('/',$_SERVER['REQUEST_URI']);    
    
    if(!isset($params[3]) || !is_numeric($params[3]))
    {
        header('Location: /home');
        die;
    }        
    if(isset($_POST['editorPagina'])) 
    { 
        $sql = 'update paginas set conteudo=:conteudo, conteudo_pesquisa=:conteudo_pesquisa where id =:id ';       
        $stmt = $conn->prepare($sql);
        $stmt->bindValue('conteudo',$_POST['editorPagina']);
        $stmt->bindValue('conteudo_pesquisa',strip_tags($_POST['editorPagina']));
        $stmt->bindValue('id',$params[3]);
        $stmt->execute();
        
        if(isset($params['5']))
        {
            header('Location: /' . $params['5']);
            die;
        }             

        
    }    

    
    $sql = 'select * from paginas where id=:id';
    $stmt = $conn->prepare($sql);    
    $stmt->bindValue('id',$params[3]);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="row titulo-admin">
    <div class="col-md-6">
        <h2>Editando Página : <?=$res['titulo']?></h2>        
    </div>  
    <div class="col-md-6 text-right">
      <a href="javascript:submitForm('')" class="btn btn-primary" role="button">Salvar</a>    
      <a href="javascript:submitForm('/p/admin')" class="btn btn-primary" role="button">Salvar e Voltar</a>    
      <a href="javascript:submitForm('/p/<?=$res['descricao']?>')" class="btn btn-primary" role="button">Salvar e Visualizar</a>    
      <a href="/admin" class="btn btn-default" role="button">Voltar</a>  
      <a href="/logout" class="btn btn-danger" role="button">Logout</a>
    </div>
</div>    
<hr>
<div class="row">
    <div class="col-md-12">
        <form id="frm-editpagina" action="/editpagina/id/<?=$res['id']?>" method="post">
          <textarea id="editorPagina" name="editorPagina"><?=$res['conteudo'];?></textarea>   
        </form>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<script type="text/javascript">
   CKEDITOR.replace('editorPagina',{
       height: '300px',
       allowedContent: true,
       extraAllowedContent:  '*(*)'
   });
   
   function submitForm(params)
   {
       document.getElementById('frm-editpagina').action += params;
       document.getElementById('frm-editpagina').submit();
   }
</script>