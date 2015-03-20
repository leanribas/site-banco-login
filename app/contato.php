<form id='form-contato' action='/contatoview' method="post">
    <div class="row">
        <div class="col-md-12">
            <h1>Contato</h1>
            <div class="row">
                <div class="col-md-6"><input class="col-md-12 form-control" name="nome" type="text" placeholder="Seu Nome"></div>            
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6"><input class="col-md-12 form-control" name="email" type="text" placeholder="Seu E-mail"></div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6"><input class="col-md-12 form-control" name="assunto" type="text" placeholder="Assunto"></div>
            </div>    
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6"><textarea class="form-control" name="mensagem" placeholder="Mensagem" rows="3"></textarea></div>
            </div>          
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6">
                    <div class="text-right">
                        <a href="javascript: document.getElementById('form-contato').submit();" class="btn btn-primary ">Enviar</a>
                    </div>                
                </div>
            </div>        

        </div>
    </div>
</form>