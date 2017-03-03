		<footer class="footer text-center">
                  
			&copy; 2017 Designed & Created by CROMA, All rights reserved - 
			<a href="mentions.php">Mentions légales</a>
		</footer>
	<!-- Fermeture du div container (entete.php) -->
	</div>
<!--	<script src="js/recherche.js"></script>-->

<!-- jQuery -->
<script src="<?= $this->assetUrl('vendor/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<!-- redémarrage URL à partir du répertoire asset -->
<script src="<?= $this->assetUrl('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= $this->assetUrl('vendor/metisMenu/metisMenu.min.js') ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?= $this->assetUrl('vendor/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= $this->assetUrl('vendor/datatables-plugins/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= $this->assetUrl('vendor/datatables-responsive/dataTables.responsive.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= $this->assetUrl('dist/js/sb-admin-2.js') ?>"></script>

<script src="<?= $this->assetUrl('js/script.js') ?>"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    $(document).ready(function() {
        
        if ($('#dataTables-example').length) {
            $('#dataTables-example').DataTable({
                responsive: true,
                // options tri de colonnes sur affichage table des articles
                //         ID ,Titre,Contenu,Date,Action
                columns: [null, null, null, null, {"orderable": false}]
            });
        }
    });
</script>
</body>
</html>