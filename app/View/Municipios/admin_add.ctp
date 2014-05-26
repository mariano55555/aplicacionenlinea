
<?php 
echo $this->Html->script('outside/eakrokoforselect', array('block' => 'script'));
?>
			<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="glyphicon-road"></i>NUEVO MUNICIPIO</h3>
							</div>
							<div class="box-content nopadding">
								<?php 
								echo $this->Form->create('Municipio', array( "class" => "form-horizontal form-bordered form-wysiwyg", 'inputDefaults' => array('label' => false, 'div'=>false))); 
								?>
								<div class="control-group">
										<label for="textfield" class="control-label">Municipio</label>
										<div class="controls">
											<?php echo $this->Form->input('name', array("type" => "text", 'class' => 'input-xlarge')); ?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">Departamento</label>
										<div class="controls">
											<?php echo $this->Form->input('departamento_id', array("type" => "select", 'class' => 'chosen-select')); ?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">C&oacute;digo POMA</label>
										<div class="controls">
											<?php echo $this->Form->input('codsql_municipio', array("type" => "text", 'class' => 'input-xlarge')); ?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">¿Activo?</label>
										<div class="controls">
											<?php echo $this->Form->input('activo', array("checked" =>"check", 'class' => 'icheck-me', "data-skin"=>"square", "data-color"=>"blue")); ?>
										</div>
								</div>
								<div class="form-actions">
										<?php 
											   echo $this->Js->submit('Crear', array(
													'class'      => 'btn btn-info submit',
													'update'     => '#municipiostable',
													'success'    => "ajaxsubmitaddmessage('$this->webroot');",
													'error'      => "ajaxsubmiterrormessage('$this->webroot');"
											   	));
										?>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<?php
				echo $this->Js->get('.submit')->event('click', "$('#form-content-municipiosadd').modal('hide')");
				?>