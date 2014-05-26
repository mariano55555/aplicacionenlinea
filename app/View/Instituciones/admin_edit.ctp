<?php 
echo $this->Html->script('outside/eakrokoforselect', array('block' => 'script'));
?>
<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="glyphicon-building"></i>EDITAR INSTITUCION</h3>
							</div>
							<div class="box-content nopadding">
								<?php 
								echo $this->Form->create('Institucione', array( "class" => "form-horizontal form-bordered form-wysiwyg", 'inputDefaults' => array('label' => false, 'div'=>false))); 
								echo $this->Form->input('id');
								?>
								<div class="control-group">
										<label for="textfield" class="control-label">Instituci&oacute;n</label>
										<div class="controls">
											<?php echo $this->Form->input('name', array("type" => "text", 'class' => 'input-xlarge')); ?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">C&oacute;digo POMA</label>
										<div class="controls">
											<?php echo $this->Form->input('codsql', array("type" => "text", 'class' => 'input-xlarge')); ?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">¿Privada?</label>
										<div class="controls">
											<?php 
											if ($this->request->data['Institucione']['tipo'] == 1) {
												echo $this->Form->input('tipo', array("checked" =>false,'type'=>'checkbox','class' => 'icheck-me', "data-skin"=>"square", "data-color"=>"blue")); 
											}else{
												echo $this->Form->input('tipo', array("checked" =>"check",'type'=>'checkbox','class' => 'icheck-me', "data-skin"=>"square", "data-color"=>"blue")); 
											}
											?>
										</div>
								</div>
								<div class="control-group">
										<label for="textfield" class="control-label">¿Activo?</label>
										<div class="controls">
											<?php echo $this->Form->input('activo', array('class' => 'icheck-me', "data-skin"=>"square", "data-color"=>"blue")); ?>
										</div>
								</div>
								<div class="form-actions">
										<?php 
											   echo $this->Js->submit('Editar', array(
													'class'      => 'btn btn-info submit',
													'update'     => '#institucionestable',
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
				echo $this->Js->get('.submit')->event('click', "$('#form-content-institucionesedit').modal('hide')");
				?>
