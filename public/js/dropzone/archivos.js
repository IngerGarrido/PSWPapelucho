Dropzone.options.dropzoneImagenes = {

    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
    },
    paramName: "file",
    autoProcessQueue: false,
    uploadMultiple: true,
    maxFilesize: 10,
    maxFiles:20,
    addRemoveLinks: true,
    dictRemoveFile: 'Eliminar',



    init: function(){
        var submitButton= document.querySelector("#guardar-archivos")

        dropzoneImagenes = this;


        submitButton.addEventListener("click",function(e){
            e.preventDefault();
            e.stopPropagation();
            dropzoneImagenes.processQueue();
        });


        this.on("addedfile", function(file){
        });

        this.on("complete", function(file){
            dropzoneImagenes.removeFile(file);
        });

        this.on("success",
            dropzoneImagenes.processQueue.bind(dropzoneImagenes)
        );
    }

}

$('#archivosTabs a').click(function (e) {
    e.preventDefault()
    alert($(this).data('type'))
    $(this).tab('show')
    $('#archivosTabs a[href="#imagen"]').tab('show')
    $('#archivosTabs a[href="#boletin"]').tab('show')
    $('#archivosTabs a[href="#informe"]').tab('show')
    $('#archivosTabs a[href="#informacion"]').tab('show')

    $('#type').attr('value',$(this).data('type'))
})

