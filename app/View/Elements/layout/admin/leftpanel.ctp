<div id="left">
			<br><br>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>SEGURIDAD</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<?php
						echo $this->Html->link('Usuarios',array("controller"=>"Users", "action"=>"index", 'admin' => true), array('imgroot'=>$this->webroot,'class' => 'button', 'id' => 'usuariosMenu'));
						 ?>
					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown">Bitacoras</a>
						<ul class="dropdown-menu">
							<li>
									<?php
										echo $this->Html->link('Log',array("controller"=>"AccionesTablasUsers", "action"=>"index", 'admin' => true), array('logsroot'=>$this->webroot,'class' => 'button', 'id' => 'logsMenu'));
									?>
							</li>
							<li>
								<?php
										echo $this->Html->link('Accesos',array("controller"=>"Accesos", "action"=>"index", 'admin' => true), array('accesosroot'=>$this->webroot,'class' => 'button', 'id' => 'accesosMenu'));
									?>
							</li>
							<li>
								<?php
										echo $this->Html->link('Permisos',array("controller"=>"Permisos", "action"=>"index", 'admin' => true), array('accesosroot'=>$this->webroot,'class' => 'button', 'id' => 'accesosMenu'));
									?>
							</li>
						</ul>
					</li>
				</ul>
			</div>

			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>ADMINISTRACION</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<?php
							echo $this->Html->link('Configuración básica',array("controller"=>"Aplicaciones", "action"=>"generales", "admin" => true), array('root'=>$this->webroot,'class' => 'button', 'id' => 'generales'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('Configuración adicional',array("controller"=>"Aplicaciones", "action"=>"generalesgeo", "admin" => true), array('rootgeo'=>$this->webroot,'class' => 'button', 'id' => 'generalesgeo'));
						?>
					</li>
				</ul>
			</div>


			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>REPORTES</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<?php
							echo $this->Html->link('Postulantes por período',array("controller"=>"Aplicaciones", "action"=>"rpostulantes", 'admin'=> TRUE), array('rpostulantesroot'=>$this->webroot,'class' => 'button', 'id' => 'rpostulantes'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('Instituciones',array("controller"=>"Aplicaciones", "action"=>"rinstituciones",'admin'=> TRUE), array('rinstitucionesroot'=>$this->webroot,'class' => 'button', 'id' => 'rinstituciones'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('Departamentos/ciudades',array("controller"=>"Aplicaciones", "action"=>"rdepartamentos", 'admin' => TRUE), array('rdepartamentosroot'=>$this->webroot,'class' => 'button', 'id' => 'rdepartamentos'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('% Avance',array("controller"=>"Aplicaciones", "action"=>"ravance", 'admin' => TRUE), array('ravanceroot'=>$this->webroot,'class' => 'button', 'id' => 'ravance'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('Comparar',array("controller"=>"Aplicaciones", "action"=>"rcomparar", 'admin' => TRUE), array('rcompararroot'=>$this->webroot,'class' => 'button', 'id' => 'rcomparar'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('Proyección',array("controller"=>"Aplicaciones", "action"=>"rproyeccion", 'admin' => TRUE), array('rproyeccionroot'=>$this->webroot,'class' => 'button', 'id' => 'rproyeccion'));
						?>
					</li>
				</ul>
			</div>
		</div>