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

    // Summernote
    $('#summernote').summernote({
        minHeight: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['estilo', ['style']],
            ['estilo2', ['bold', 'italic', 'underline', 'clear']],
            ['fonte', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['tabela', ['table']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'hr']],
            ['outros', ['fullscreen', 'help']]
        ]
    })


    /**
     * Initiate  glightbox 
     */
    const glightbox = GLightbox({
        selector: '.glightbox'
    });

})()