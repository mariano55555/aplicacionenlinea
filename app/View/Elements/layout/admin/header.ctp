<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">ESEN</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class='active'>
					<!--<a href="index.html">
						<span>Dashboard</span>
					</a>-->
					<?php
						echo $this->Js->link("<span>Dashboard</span>", array('controller' => 'Users', 'action'=>'dashboard','admin' => true), array(
							'update' => '#here',
							'escape' => false,
							'htmlAttributes' => array(
								'class' => 'btn'
								)
						));
					?>
				</li>
			</ul>
			<div class="user">
				<ul class="icon-nav">
					<li class='dropdown colo'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-tint"></i></a>
						<ul class="dropdown-menu pull-right theme-colors">
							<li class="subtitle">
								Predefined colors
							</li>
							<li>
								<span class='red'></span>
								<span class='orange'></span>
								<span class='green'></span>
								<span class="brown"></span>
								<span class="blue"></span>
								<span class='lime'></span>
								<span class="teal"></span>
								<span class="purple"></span>
								<span class="pink"></span>
								<span class="magenta"></span>
								<span class="grey"></span>
								<span class="darkblue"></span>
								<span class="lightred"></span>
								<span class="lightgrey"></span>
								<span class="satblue"></span>
								<span class="satgreen"></span>
							</li>
						</ul>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">
						
						<?php
							echo $current_user['username'];
							#echo $img;
							#
							echo $this->Html->image('demo/user-avatar.jpg', array('alt' => 'Usuario'));
						?>
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="more-userprofile.html">Editar Perfil</a>
						</li>
						<li>
							<a href="#">Configuraci&oacute;n de Cuenta</a>
						</li>
						<li>
							<?php
								echo $this->Html->link('Salir',array("controller"=>"Users", "action"=>"logout", 'admin'=>false));
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>