<?php 
echo $this->Html->script('outside/eakrokoforselect', array('block' => 'script'));
?>
			<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-globe"></i>NUEVO PAIS</h3>
							</div>
							<div class="box-content nopadding">
								<?php 
								echo $this->Form->create('Paise', array( "class" => "form-horizontal form-bordered form-wysiwyg", 'inputDefaults' => array('label' => false, 'div'=>false))); 
								?>
								<div class="control-group">
										<label for="textfield" class="control-label">Pa&iacute;s</label>
										<div class="controls">
											<?php echo $this->Form->input('name', array("type" => "text", 'class' => 'input-xlarge')); ?>
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
													'update'     => '#paisestable',
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
				echo $this->Js->get('.submit')->event('click', "$('#form-content-paisesadd').modal('hide')");
				?>

