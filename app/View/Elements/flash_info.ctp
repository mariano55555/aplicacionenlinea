<?php 
/*echo $this->Html->scriptBlock('
$(function(){
	$.gritter.add({
		title: "' . __("Información",true) . '",
		text: "' . $message . '",
		image: webroot + "img/info_48.png",
		sticky: false
	});
});') */
?>

<script>
$(function(){
	$.gritter.add({
		title: "Información",
		text: "<?php echo $message; ?>",
		image: "<?php echo $this->webroot; ?>img/info_48.png",
		sticky: false
	});
});	
</script>