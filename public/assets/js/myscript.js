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
        selectYears: 100, // Creates a dropdown of 15 years to control year
        format: 'dd-mm-yyyy',

    });
    $('input.autocomplete').autocomplete({
        data: {
            "Afghanistan": null,
            "Albania": null,
            "Algeria": null,
            "Andorra": null,
            "Angola": null,
            "Antigua and Barbuda": null,
            "Argentina": null,
            "Armenia": null,
            "Australia": null,
            "Austria": null,
            "Azerbaijan": null,
            "Bahamas": null,
            "Bahrain": null,
            "Bangladesh": null,
            "Barbados": null,
            "Belarus": null,
            "Belgium": null,
            "Belize": null,
            "Benin": null,
            "Bhutan": null,
            "Bolivia": null,
            "Bosnia and Herzegovina": null,
            "Botswana": null,
            "Brazil": null,
            "Brunei": null,
            "Bulgaria": null,
            "Burkina Faso": null,
            "Burundi": null,
            "Cambodia": null,
            "Cameroon": null,
            "Canada": null,
            "Cape Verde": null,
            "Central African Republic": null,
            "Chad": null,
            "Chile": null,
            "China": null,
            "Colombia": null,
            "Comoros": null,
            "Congo (Brazzaville)": null,
            "Congo": null,
            "Costa Rica": null,
            "Cote d'Ivoire": null,
            "Croatia": null,
            "Cuba": null,
            "Cyprus": null,
            "Czech Republic": null
        },
        limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function (val) {
            // Callback function when value is autcompleted.
        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });

    $('select').material_select('destroy');
    $('select').material_select();
    $('.fixed-action-btn').openFAB();
    $('.fixed-action-btn').closeFAB();
    $('.fixed-action-btn.toolbar').openToolbar();
    $('.fixed-action-btn.toolbar').closeToolbar();
    Materialize.toast('I am a toast!', 3000, 'rounded')


    $('input#input_text, textarea#textarea1').characterCounter();


});

