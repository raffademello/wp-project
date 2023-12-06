<footer class="dark:bg-gray-900 py-4 mt-auto">
	<div class="container mx-auto">
		<div class="text-white text-center">
			<?php echo date("Y"); ?> - Rafael de Melo - Todos os direitos reservados.
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<script>
	$(document).ready(function() {
		$(".toggle-mnu").click(function() {
			$(this).toggleClass("on");
			$(".main-mnu").slideToggle();
			$("#primary-menu-container").toggleClass('hidden');
			return false;
		});
	});
</script>
</body>

</html>