        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>RS Soluções | <?=date("Y");?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <script src="<?=base_url("vendor/js/jquery.min.js");?>"></script>
  <script src="<?=base_url("vendor/js/bootstrap.bundle.min.js");?>"></script>

  <script src="<?=base_url("vendor/js/sb-admin-2.min.js");?>"></script>
  
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!--<script src="<?=base_url("vendor/js/Chart.min.js");?>"></script> -->
  <script src="<?=base_url("vendor/js/jquery.mask.min.js");?>"></script> 
  <script>
	$(document).ready(function(){ 
		$('#valorContrato').mask('000.000.000.000.000,00', {reverse: true});
		$('#valorParcela').mask('000.000.000.000.000,00', {reverse: true});
		$('#estimativa').mask('000.000.000.000.000,00', {reverse: true});
		$('#agencia').mask('0000');
		$('#vencimento').mask('00');
		$('#cpf').mask('000.000.000-00');
		$('#celular').mask('(00)0 0000-0000');
		$('#telefone').mask('(00) 0000-0000');
		$('#conta_corrente').mask('00000-0', {reverse: true});
	});
  </script>

</body>

</html>