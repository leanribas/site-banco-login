<?php
require_once('conexao.php');

$conn = conexaoDB();

echo "## Removendo Tabelas ##";
$conn->exec('drop table if exists paginas');
$conn->exec('drop table if exists usuarios');
echo " - Ok\n";
echo "## Criando Tabela ##";
$conn->exec('create table paginas'
        . '('
        . 'id int not null auto_increment,'
        . 'descricao varchar(50) character set \'utf8\' not null,'
        . 'titulo varchar(50) character set \'utf8\' not null,'
        . 'conteudo text character set \'utf8\' not null,'
        . 'conteudo_pesquisa text character set \'utf8\' not null,'
        . 'primary key(id))');

$conn->exec('create table usuarios'
        . '('
        . 'id int not null auto_increment,'
        . 'login varchar(50) character set \'utf8\' not null,'
        . 'password varchar(200) character set \'utf8\' not null,'
        . 'primary key(id))');
echo " - Ok\n";
echo '## Inserindo dados ##';
$sql = 'insert into paginas (descricao,titulo,conteudo,conteudo_pesquisa) values(:descricao,:titulo,:conteudo,:conteudo_pesquisa)';
$stmt = $conn->prepare($sql);

//home
$stmt->bindValue('descricao', 'home');
$stmt->bindValue('titulo', 'Home');
$conteudo = '<div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item"><img class="media-object img-rounded" src="http://placehold.it/1170x350/B7394C"></div>
                    <div class="item"><img class="media-object img-rounded" src="http://placehold.it/1170x350/3895B8"></div>
                    <div class="item"><img class="media-object img-rounded" src="http://placehold.it/1170x350/BAB436"></div>
                </div>
                <!-- Carousel navegação -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>

            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Ecomonia</h2>
                    <p><img src="/img/livro.png" class="flutuar-img">O presente artigo teve como objetivo analisar a estrutura de mercado da indústria brasileira de caminhões no período de 1990 a 2010, dado que este setor mostra-se de fundamental importância para o desenvolvimento econômico do país ao promover a integração dos demais setores.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Anuncios</h2>
                    <p><img src="/img/fone.png" class="flutuar-img">Seu anúncio fica publicado 24 horas por dia e você pode negociar por e-mail e sem intermediários. Gerencie as informações do anúncio sem precisar sair de casa. Anuncie e venda pelo maior valor ao invés de receber menos na troca por outra coisa. Não espere desvalorizar no mercado, faça um bom negócio</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Rentabilidade</h2>
                    <p><img src="/img/grana.png" class="flutuar-img">O Tesouro Direto é atualmente um dos mais poderosos instrumentos para as pessoas físicas construírem um bom patrimônio, com alta rentabilidade e risco baixo. Porém, muitos ainda têm dúvidas sobre as melhores formas de montar uma carteira de títulos públicos.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
            </div>
';
$stmt->bindValue('conteudo', $conteudo);
$stmt->bindValue('conteudo_pesquisa',trim(strip_tags($conteudo)));
$stmt->execute();

//empresa
$stmt->bindValue('descricao', 'empresa');
$stmt->bindValue('titulo', 'Empresa');
$conteudo = '<div class="row">
                <div class="col-md-12">
                    <h2>A Empresa</h2>
                    <p><img src="/img/livro.png" class="flutuar-img">Fundada em 1993, a Empresa é uma empresa jovem, moderna e dinâmica, especializada no desenvolvimento de softwares e aplicações para a plataforma web.
                    Atuando no mercado nacional, fornece sistemas que atendem as necessidades operacionais, estratégicas e gerencias de seus clientes, garantindo informações com transparência, rapidez e confiabilidade.</p>
                    <br>
                    <h4>Estratégia</h4>
                    <p>A Empresa adota uma estratégia muito forte e eficiente de parceria com seus clientes. Todas as solicitações de sugestões e implementações de novas funcionalidades, são desenvolvidas e implementadas ao sistema, sem custo adicional. Com isso, nossos clientes são atendidos em suas solicitações, e os nossos sistemas crescem em funcionalidades, aumentando ainda mais, o nosso diferencial em relação aos demais sistemas no mercado.</p>
                    <h4>Negócio</h4>
                    <p>Desenvolver e comercializar softwares de gestão para administrações privadas, públicas municipal, estadual, federal e suas autarquias</p>
                    <h4>Missão</h4>
                    <p>Garantir aos nossos clientes, sistemas de baixo custo de aquisição, de fácil implementação, modernos, confiáveis e principalmente, com excelente suporte operacional aos seus usuários.</p>
                    
                </div>
            </div>';
$stmt->bindValue('conteudo', $conteudo);
$stmt->bindValue('conteudo_pesquisa', trim(strip_tags($conteudo)));
$stmt->execute();

//produtos
$stmt->bindValue('descricao', 'produtos');
$stmt->bindValue('titulo', 'Produtos');
$conteudo = '<div class="row">
                <div class="col-md-4">
                    <h2>Livros</h2>
                    <p><img src="/img/livro.png" class="flutuar-img">Temos todos os tipos de livros, entregamos em todo o mundo. Quanto mais livros comprar os descontos aumentam. Faça seu cartão fidelidade e aumente ainda mais as vantagens de ser um cliente vip.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Megafones</h2>
                    <p><img src="/img/fone.png" class="flutuar-img">Os melhores megafones do mercado. Para várias utilizações, temos todos os tamanhos, acima de 5 unidades os preços baixam. </p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Dim-Dim</h2>
                    <p><img src="/img/grana.png" class="flutuar-img">Está negativado. Aqui isso não é problema, venha fazer uma simulação com a gente e ganhe cem reais sem compromisso. Pague quando puder.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
            </div>';
$stmt->bindValue('conteudo', $conteudo);
$stmt->bindValue('conteudo_pesquisa', trim(strip_tags($conteudo)));
$stmt->execute();

//serviços
$stmt->bindValue('descricao', 'servicos');
$stmt->bindValue('titulo', 'Serviços');
$conteudo = '<div class="row">
                <div class="col-md-6">
                    <h2>Impressão</h2>
                    <p><img src="/img/livro.png" class="flutuar-img">Quer imprimir seus livros, mande para nós em pdf que o resto a gente faz. Mandamos preto e branco e colorida, com capa dura e normal. Fazemos box. Mande o seu pdf para fazermos um orçamento. Fazemos cópias também, mande o livro, revista ou o material que deseja copiar.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
                <div class="col-md-6">
                    <h2>Distribuição</h2>
                    <p><img src="/img/livro.png" class="flutuar-img">Quer distribuir seus livros para o mundo todo. Temos a melhor rede de distribuição de livros. Seu livro está em português? Não tem problema, fazemos a tradução para o país que deseja enviar. Preenche o formulário e ligaremos para você.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Telefonista</h2>
                    <p><img src="/img/fone.png" class="flutuar-img">Secretaria virtual. Tenha um número para passar para seus clientes, anotamos recados, recebemos e-mails, fax, correspondências. Também dispomos de salas para reuniões com total privacidade, acesso a internet, café, chá, bolacha, bloco de anotações.</p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>
                <div class="col-md-6">
                    <h2>Consultor Financeiro</h2>
                    <p><img src="/img/grana.png" class="flutuar-img">Está empepinado! Devendo na praça! Converse com nossos consultores, eles lhe daram uma luz para resolver seus problemas financeiros. Conte com quem também já passou por alguns perengues. Pague apenas quando sair das contas. </p>
                    <p><a class="btn" href="#">Mais Detalhes &raquo;</a></p>
                </div>                
            </div>';
$stmt->bindValue('conteudo', $conteudo);
$stmt->bindValue('conteudo_pesquisa', trim(strip_tags($conteudo)));
$stmt->execute();

$sql = 'insert into usuarios (login,password) values(:login,:password)';
$stmt = $conn->prepare($sql);
$stmt->bindValue('login','admin');
$stmt->bindValue('password', password_hash('admincode', PASSWORD_DEFAULT));
$stmt->execute();
echo " - Ok\n";
echo "### Concluido ###";