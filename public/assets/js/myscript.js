$(document).ready(function () {


    $("#card-alert .close").click(function () {
        $(this).closest("#card-alert").fadeOut("slow")
    });


    $('.button-collapse').sideNav({
        menuWidth: 400, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens
    });
    Materialize.updateTextFields();
    $('.modal-new-donante').modal();
    $('.modal').modal();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 150, // Creates a dropdown of 15 years to control year
        format: 'dd-mm-yyyy',
    });

    $('select').material_select('destroy');
    $('select').material_select();
    $('.fixed-action-btn').openFAB();
    $('.fixed-action-btn').closeFAB();
    //$('.fixed-action-btn.toolbar').openToolbar();
    //$('.fixed-action-btn.toolbar').closeToolbar();


    $('input#input_text, textarea#textarea1').characterCounter();




    $(document).on('click', function () {


        $("#fileinput").fileinput({
            uploadUrl: "/excel.import", // server upload action
            uploadAsync: false,
            maxFileCount: 1
        }).on('filebatchpreupload', function(event, data, id, index) {
            console.log('en proceso');
        }).on('filebatchuploadsuccess', function(event, data, id, index) {
            console.log('envio',data);
        }).on('filebatchuploaderror', function(event, data, id, index) {
            console.log('error',event)
        });

    });




});




