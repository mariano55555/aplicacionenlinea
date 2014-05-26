<?php 
/*echo $this->Html->scriptBlock('
$(function(){
	$.gritter.add({
		title: "' . __("Error",true) . '",
		text: "' . $message . '",
		image: webroot + "img/warning_48.png",
		sticky: false
	});
});') */
?>

<script>
$(function(){
	$.gritter.add({
		title: "Error",
		text: "<?php echo $message; ?>",
		image: "<?php echo $this->webroot; ?>img/warning_48.png",
		sticky: false
	});
});	
</script>