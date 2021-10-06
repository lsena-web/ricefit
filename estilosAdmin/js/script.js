$(function() {

    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "print", "colvis"]
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

    // Summernote
    $('#summernote2').summernote({
        minHeight: 300,
        toolbar: [
            ['estilo2', ['bold', 'italic']],
            ['tabela', ['table']],
            ['insert', ['picture']],
            ['outros', ['fullscreen']]
        ]
    })


    /**
     * Initiate  glightbox 
     */
    const glightbox = GLightbox({
        selector: '.glightbox'
    });

})()