<?php

  date_default_timezone_set('America/Sao_Paulo');
  define('APPLICATION_PATH', '../app/');
  set_include_path(APPLICATION_PATH
                   . PATH_SEPARATOR
                   . get_include_path());
  
  $paginasFixas = array(
      'contato',
      'contatoview',
      'pesquisa',
      'admin',
      'logout',
      'notfound',
      'editpagina'
  );
  