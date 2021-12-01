<!-- Modal -->
<div class="modal fade" id="modalSair" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title text-bold text-lg" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
            </div>
            <div class="modal-footer d-flex justify-content-around">

                <div class="col-auto mr-auto">
                    <button type="button" class="btn btn-outline-light text-bold" data-dismiss="modal">Cancelar</button>
                </div>

                <div class="col-auto">
                    <a href="logout.php" class="btn btn-outline-light text-bold"><i class="fas fa-sign-out-alt mr-2"></i>Sair</a>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">

    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">riceFit</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../b4/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../b4/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../b4/dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="../b4/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/dataTable/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/dataTable/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/dataTable/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/dataTable/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/dataTable/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/dataTable/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/dataTable/plugins/jszip/jszip.min.js"></script>
<script src="../plugins/dataTable/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/dataTable/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/dataTable/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<!-- <script src="../plugins/dataTable/plugins/datatables-buttons/js/buttons.print.min.js"></script> -->
<script src="../plugins/dataTable/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/dataTable/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plugins/dataTable/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- gligthbox -->
<script src="../b4/plugins/glightbox/js/glightbox.min.js"></script>
<!-- mask -->
<script src="../plugins/mascara/mascara.js"></script>
<!-- configs -->
<script src="../estilos/js/script.js"></script>
</body>

</html>