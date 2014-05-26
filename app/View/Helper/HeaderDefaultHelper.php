<?php  
App::uses('AppHelper', 'View/Helper');

class HeaderDefaultHelper extends AppHelper {
    public $helpers = array('Html','Js');

    public function display($tema = NULL, $finalizado = NULL)
    {
        $html = '<!--Header-->
                <header>
                  <div class="row-fluid">
                        <div class="navbar-fixed-top">
                        
                            <!--Top bar-->
                            <section class="topbar">
                              <div class="container">
                                    <div class="row-fluid">
                                        <h1 class="pull-left">
                                          <a title="Home" href="http://www.esen.edu.sv" target="_blank">ESEN</a>
                                        </h1>
                                        <a href="tel:+50322349292" title="CTA" class="btn pull-right">
                                          <i class="icon-phone-1"></i>(503)2234-9292</a>
                                    </div>
                                </div>
                            </section>
                            <!--End Top bar-->
                
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="container" style="font-size:0.8em !important">
                
                                        <!--Mobile Main Menu-->
                                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <!--Mobile Main Menu-->
                
                                        <!--Desktop Main Menu-->
                                        <div class="nav-collapse collapse">
                                            <ul class="nav">';

                                                switch ($tema) {
                                                    case 1:
                                               $html.=  '<li><a href="'.$this->webroot.'punto_de_partida">Inicio</a></li>';
                                               $html.=  '<li class="active"><a href="'.$this->webroot.'primera_parte">Parte 1</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'segunda_parte">Parte 2</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'tercera_parte">Parte 3</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'cuarta_parte">Parte 4</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'quinta_parte">Parte 5</a></li>';
                                                        break;
                                                    case 2:
                                               $html.=  '<li><a href="'.$this->webroot.'punto_de_partida">Inicio</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'primera_parte">Parte 1</a></li>';
                                               $html.=  '<li class="active"><a href="'.$this->webroot.'segunda_parte">Parte 2</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'tercera_parte">Parte 3</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'cuarta_parte">Parte 4</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'quinta_parte">Parte 5</a></li>';                                                        
                                                        break;
                                                    case 3:
                                               $html.=  '<li><a href="'.$this->webroot.'punto_de_partida">Inicio</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'primera_parte">Parte 1</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'segunda_parte">Parte 2</a></li>';
                                               $html.=  '<li class="active"><a href="'.$this->webroot.'tercera_parte">Parte 3</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'cuarta_parte">Parte 4</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'quinta_parte">Parte 5</a></li>';                                                        
                                                        break;
                                                    case 4:
                                               $html.=  '<li><a href="'.$this->webroot.'punto_de_partida">Inicio</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'primera_parte">Parte 1</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'segunda_parte">Parte 2</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'tercera_parte">Parte 3</a></li>';
                                               $html.=  '<li class="active"><a href="'.$this->webroot.'cuarta_parte">Parte 4</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'quinta_parte">Parte 5</a></li>';                                                        
                                                        break;
                                                    case 5:
                                               $html.=  '<li><a href="'.$this->webroot.'punto_de_partida">Inicio</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'primera_parte">Parte 1</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'segunda_parte">Parte 2</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'tercera_parte">Parte 3</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'cuarta_parte">Parte 4</a></li>';
                                               $html.=  '<li class="active"><a href="'.$this->webroot.'quinta_parte">Parte 5</a></li>';
                                                        break;
                                                    default:
                                               $html.=  '<li><a href="'.$this->webroot.'punto_de_partida">Inicio</a></li>';
                                               $html.=  '<li class="active"><a href="'.$this->webroot.'primera_parte">Parte 1</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'segunda_parte">Parte 2</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'tercera_parte">Parte 3</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'cuarta_parte">Parte 4</a></li>';
                                               $html.=  '<li><a href="'.$this->webroot.'quinta_parte">Parte 5</a></li>';                                                        
                                                        break;
                                                }

                                switch ($finalizado) {
                                  case 1:
                                     $html.=    '</ul>
                                            <ul class="nav pull-right">
                                                <li class="pulse pulse2"><a href="'.$this->webroot.'Users/finalizar">Finalizar</a></li>
                                                <li><a href="'.$this->webroot.'Users/logout">Salir</a></li>
                                            </ul>';
                                    break;
                                  
                                  default:
                                     $html.=    '</ul>
                                            <ul class="nav pull-right">
                                                <li><a href="'.$this->webroot.'Users/logout">Salir</a></li>
                                            </ul>';
                                    break;
                                }
                               
                                $html.= '</div>
                                        <!--End Desktop Main Menu-->
                
                                    </div><!--/.container -->
                                </div><!--/.nav-inner -->
                            </div>
                        </div>
                  </div>
                </header>
              <!--Header-->';
        return $html;
    }
}
