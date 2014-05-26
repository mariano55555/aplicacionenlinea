<p>Ingresa al siguiente enlace para cambiar tu contraseña</p>
<p>
	<a href="<?php echo $this->webroot.'users/reset/'.$cadena."/".$id; ?>">
		<?php echo "http:/".$this->webroot."users/reset/".$cadena.'/'.$id; ?>
	<a>
</p>
<?php
$date = date_create($expira);
?>
<p>El enlace tiene una duraci&oacute;n de 24 horas y expira el <?php echo date_format($date, 'd-m-Y g:i A'); ?></p>
