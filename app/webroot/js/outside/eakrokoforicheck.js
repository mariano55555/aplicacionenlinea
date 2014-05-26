// FLAT Theme v2.0
(function( $ ){
	$.fn.retina = function(retina_part) {
		// Set default retina file part to '-2x'
		// Eg. some_image.jpg will become some_image-2x.jpg
		var settings = {'retina_part': '-2x'};
		if(retina_part) jQuery.extend(settings, { 'retina_part': retina_part });
		if(window.devicePixelRatio >= 2) {
			this.each(function(index, element) {
				if(!$(element).attr('src')) return;

				var checkForRetina = new RegExp("(.+)("+settings['retina_part']+"\\.\\w{3,4})");
				if(checkForRetina.test($(element).attr('src'))) return;

				var new_image_src = $(element).attr('src').replace(/(.+)(\.\w{3,4})$/, "$1"+ settings['retina_part'] +"$2");
				$.ajax({url: new_image_src, type: "HEAD", success: function() {
					$(element).attr('src', new_image_src);
				}});
			});
		}
		return this;
	}
})( jQuery );
/*function icheck(){
	if($(".icheck-me").length > 0){
		$(".icheck-me").each(function(){
			var $el = $(this);
			var skin = ($el.attr('data-skin') !== undefined) ? "_"+$el.attr('data-skin') : "",
			color = ($el.attr('data-color') !== undefined) ? "-"+$el.attr('data-color') : "";

			var opt = {
				checkboxClass: 'icheckbox' + skin + color,
				radioClass: 'iradio' + skin + color,
				increaseArea: "10%"
			}

			$el.iCheck(opt);
		});
	}
}*/
$(document).ready(function() {
	var mobile = false,
	tooltipOnlyForDesktop = true,
	notifyActivatedSelector = 'button-active';

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		mobile = true;
	}

	icheck();

	if($(".complexify-me").length > 0){
		$(".complexify-me").complexify(function(valid, complexity){
			if(complexity < 40){
				$(this).parent().find(".progress .bar").removeClass("bar-green").addClass("bar-red");
			} else {
				$(this).parent().find(".progress .bar").addClass("bar-green").removeClass("bar-red");
			}

			$(this).parent().find(".progress .bar").width(Math.floor(complexity)+"%").html(Math.floor(complexity)+"%");
		});
	}

		

	
	

	// Notifications
	$(".notify").click(function(){
		var $el = $(this);
		var title = $el.attr('data-notify-title'),
		message = $el.attr('data-notify-message'),
		time = $el.attr('data-notify-time'),
		sticky = $el.attr('data-notify-sticky'),
		overlay = $el.attr('data-notify-overlay');

		$.gritter.add({
			title: 	(typeof title !== 'undefined') ? title : 'Message - Head',
			text: 	(typeof message !== 'undefined') ? message : 'Body',
			image: 	(typeof image !== 'undefined') ? image : null,
			sticky: (typeof sticky !== 'undefined') ? sticky : false,
			time: 	(typeof time !== 'undefined') ? time : 3000
		});
	});

	// masked input
	if($('.mask_date').length > 0){
		$(".mask_date").mask("9999/99/99");	
	}
	if($('.mask_phone').length > 0){
		$(".mask_phone").mask("(999) 999-9999");
	}
	if($('.mask_serialNumber').length > 0){
		$(".mask_serialNumber").mask("9999-9999-99");	
	}
	if($('.mask_productNumber').length > 0){
		$(".mask_productNumber").mask("aaa-9999-a");	
	}
	if($('.mask_dui').length > 0){
		$(".mask_dui").mask("99999999-9");	
	}
	if($('.mask_nit').length > 0){
		$(".mask_nit").mask("9999-999999-999-9");	
	}
	// tag-input
	if($(".tagsinput").length > 0){
		$('.tagsinput').each(function(e){
			$(this).tagsInput({width:'auto', height:'auto'});
		});
	}

	// datepicker
	if($('.datepick').length > 0){
		$('.datepick').datepicker();
	}

	// daterangepicker
	if($('.daterangepick').length > 0){
		$('.daterangepick').daterangepicker();
	}

	// timepicker
	if($('.timepick').length > 0){
		$('.timepick').timepicker({
			defaultTime: 'current',
			minuteStep: 1,
			disableFocus: true,
			template: 'dropdown'
		});
	}
	// colorpicker
	if($('.colorpick').length > 0){
		$('.colorpick').colorpicker();	
	}
	// uniform
	if($('.uniform-me').length > 0){
		$('.uniform-me').uniform({
			radioClass : 'uni-radio',
			buttonClass : 'uni-button'
		});
	}
	// Chosen (chosen)
	if($('.chosen-select').length > 0)
	{
		$('.chosen-select').each(function(){
			var $el = $(this);
			var search = ($el.attr("data-nosearch") === "true") ? true : false,
			opt = {};
			if(search) opt.disable_search_threshold = 9999999;
			$el.chosen(opt);
		});
	}

	if($(".select2-me").length > 0){
		$(".select2-me").select2();
	}

	// multi-select
	if($('.multiselect').length > 0)
	{
		$(".multiselect").each(function(){
			var $el = $(this);
			var selectableHeader = $el.attr('data-selectableheader'),
			selectionHeader  = $el.attr('data-selectionheader');
			if(selectableHeader != undefined)
			{
				selectableHeader = "<div class='multi-custom-header'>"+selectableHeader+"</div>";
			}
			if(selectionHeader != undefined)
			{
				selectionHeader = "<div class='multi-custom-header'>"+selectionHeader+"</div>";	
			}
			$el.multiSelect({
				selectionHeader : selectionHeader,
				selectableHeader : selectableHeader
			});
		});
	}

	// spinner
	if($('.spinner').length > 0){
		$('.spinner').spinner();
	}

	// dynatree
	if($(".filetree").length > 0){
		$(".filetree").each(function(){
			var $el = $(this),
			opt = {};
			opt.debugLevel = 0;
			if($el.hasClass("filetree-callbacks")){
				opt.onActivate = function(node){
					$(".activeFolder").text(node.data.title);
					$(".additionalInformation").html("<ul style='margin-bottom:0;'><li>Key: "+node.data.key+"</li><li>is folder: "+node.data.isFolder+"</li></ul>");
				};
			}
			if($el.hasClass("filetree-checkboxes")){
				opt.checkbox = true;

				opt.onSelect = function(select, node){
					var selNodes = node.tree.getSelectedNodes();
					var selKeys = $.map(selNodes, function(node){
						return "[" + node.data.key + "]: '" + node.data.title + "'";
					});
					$(".checkboxSelect").text(selKeys.join(", "));
				};
			}

			$el.dynatree(opt);
		});
	}

	

	// PlUpload
	if($('.plupload').length > 0){
		$(".plupload").each(function(){
			var $el = $(this);
			$el.pluploadQueue({
				runtimes : 'html5,gears,flash,silverlight,browserplus',
				url : 'js/plupload/upload.php',
				max_file_size : '10mb',
				chunk_size : '1mb',
				unique_names : true,
				resize : {width : 320, height : 240, quality : 90},
				filters : [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "Zip files", extensions : "zip"}
				],
				flash_swf_url : 'js/plupload/plupload.flash.swf',
				silverlight_xap_url : 'js/plupload/plupload.silverlight.xap'
			});
			$(".plupload_header").remove();
			var upload = $el.pluploadQueue();
			if($el.hasClass("pl-sidebar")){
				$(".plupload_filelist_header,.plupload_progress_bar,.plupload_start").remove();
				$(".plupload_droptext").html("<span>Drop files to upload</span>");
				$(".plupload_progress").remove();
				$(".plupload_add").text("Or click here...");
				upload.bind('FilesAdded', function(up, files) {
					setTimeout(function () { 
						up.start(); 
					}, 500);
				});
				upload.bind("QueueChanged", function(up){
					$(".plupload_droptext").html("<span>Drop files to upload</span>");
				});
				upload.bind("StateChanged", function(up){
					$(".plupload_upload_status").remove();
					$(".plupload_buttons").show();
				});
			} else {
				$(".plupload_progress_container").addClass("progress").addClass('progress-striped');
				$(".plupload_progress_bar").addClass("bar");
				$(".plupload_button").each(function(){
					if($(this).hasClass("plupload_add")){
						$(this).attr("class", 'btn pl_add btn-primary').html("<i class='icon-plus-sign'></i> "+$(this).html());
					} else {
						$(this).attr("class", 'btn pl_start btn-success').html("<i class='icon-cloud-upload'></i> "+$(this).html());
					}
				});
			}
		});
}

	

	// Validation
	if($('.form-validate').length > 0)
	{
		$('.form-validate').each(function(){
			var id = $(this).attr('id');
			$("#"+id).validate({
				errorElement:'span',
				errorClass: 'help-block error',
				errorPlacement:function(error, element){
					element.parents('.controls').append(error);
				},
				highlight: function(label) {
					$(label).closest('.control-group').removeClass('error success').addClass('error');
				},
				success: function(label) {
					label.addClass('valid').closest('.control-group').removeClass('error success').addClass('success');
				}
			});
		});
	}

	// force correct width for chosen
	resize_chosen();

	// file_management
	if($('.file-manager').length > 0)
	{
		$('.file-manager').elfinder({
			url:'js/plugins/elfinder/php/connector.php'
		});
	}

	if($(".ckeditor").length > 0){
		CKEDITOR.replace("ck");
	}

$(".retina-ready").retina("@2x");

});

$(window).resize(function() {
	// chosen resize bug
	resize_chosen();
});

function resize_chosen(){
	$('.chzn-container').each(function() {
		var $el = $(this);
		$el.css('width', $el.parent().width()+'px');
		$el.find(".chzn-drop").css('width', ($el.parent().width()-2)+'px');
		$el.find(".chzn-search input").css('width', ($el.parent().width()-37)+'px');
	});
}


