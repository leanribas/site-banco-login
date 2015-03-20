<?php  
  $_SESSION['logado'] = 0;
  $login_erro = false;
  if(isset($_POST['login']) && isset($_POST['password']))
  {
      $sql = 'select password from usuarios where login=:login';
      $stmt = $conn->prepare($sql);
      $stmt->bindValue('login',$_POST['login']);
      $stmt->execute();
      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      if(count($res) > 0 && password_verify($_POST['password'], $res['password']))
      {
          $_SESSION['logado'] = 1;
          header('Location: /admin');
          exit;
      }
      else
      {
          $login_erro = true;
      }    
      
  }    

?>
                <div class="container login">
			<div class="row">
				<div class="col-md-12">
                                    <?php
                                       if($login_erro == true)
                                       {
                                           echo '<div class="alert alert-warning" role="alert"><strong>Usuário</strong> ou <strong>Senha</strong> inválido.</div>';
                                       }
                                    ?>                                    
                                    <h2 style="padding-left: 50px">Área Administrativa</h2>
					<div class="panel panel-primary">
						<div class="panel-heading">Entrar</div>
						<div class="panel-body">
                                                        <form name="form-login" method="post" action="/admin">
								<input type="text" class="form-control" name="login" placeholder="Digite seu login">
								<br>
								<input type="password" class="form-control" name="password" placeholder="Digite sua senha">
                                                                <br>
                                                                <button type="submit" class="btn btn-primary">Entrar</button> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>