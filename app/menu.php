<div class="row" style="margin-top: 20px;">
    <div class="col-md-12">
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home</a></li>
                    <li><a href="/empresa">Empresa</a></li>
                    <li><a href="/produtos">Produtos</a></li>
                    <li><a href="/servicos">Serviços</a></li>
                    <li><a href="/contato">Contato</a></li>
                    <?php
                      if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1)
                      {
                          echo '<li class="active"><a href="/admin">Admin</a></li>';
                      }    
                    ?>
                </ul>
                <form class="navbar-form pull-right hidden-xs" role="search" action="/pesquisa" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Digite a palavra...">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
            </div><!--final navbar-collapse -->
        </div><!--final da navbar-->
    </div><!--final da coluna-->
</div><!--final da linha-->