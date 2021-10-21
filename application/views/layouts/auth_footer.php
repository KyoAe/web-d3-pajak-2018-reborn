<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

</div>
<!-- External JavaScripts -->
<script src="<?= base_url(); ?>public/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?= base_url(); ?>public/vendors/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url(); ?>public/vendors/counter/waypoints-min.js"></script>
<script src="<?= base_url(); ?>public/vendors/counter/counterup.min.js"></script>
<script src="<?= base_url(); ?>public/vendors/imagesloaded/imagesloaded.js"></script>
<script src="<?= base_url(); ?>public/vendors/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>public/vendors/masonry/filter.js"></script>
<script src="<?= base_url(); ?>public/vendors/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url(); ?>public/js/functions.js"></script>
<script src="<?= base_url(); ?>public/js/contact.js"></script>
<script>
	// Show password javascript
	$('.show-password').on('click', function (e){
		currentTarget = e.currentTarget;
		target = $("#" + currentTarget.dataset.target);
		if (target.attr("type") == "password")
		{
			target.attr("type", "text");
			$(this).children('input').prop('checked', true);
		}
		else
		{
			target.attr("type", "password");
			$(this).children('input').prop('checked', false);
		}
		
	});	
</script>
</body>
</html>
