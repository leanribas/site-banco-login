<?php 
  if(!isset($_POST['email']))
  {
      require_once 'contato.php';
      die;
  }    
?>
<div class="alert alert-success" role="alert"><strong>Contato enviado com sucesso!</strong> Veja as informações enviadas.</div>
<div class="row">
    <div class="col-md-6">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Nome</h4>
                <p class="list-group-item-text"><?=$_POST['nome'];?></p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">E-mail</h4>
                <p class="list-group-item-text"><?=$_POST['email'];?></p>
            </a>            
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Assunto</h4>
                <p class="list-group-item-text"><?=$_POST['assunto'];?></p>
            </a>            
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">Mensagem</h4>
                <p class="list-group-item-text"><?=nl2br($_POST['mensagem']);?></p>
            </a>            
        </div>
    </div>            
</div>