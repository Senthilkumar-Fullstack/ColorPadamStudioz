$(document).ready(function() {
    $('.bxslider').bxSlider({
        adaptiveHeight: true,
        mode: 'fade'
    });

    $('.quote-wrapper').matchHeight();

    $('input.calendar').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    $('input[name="tripType"]').on("change", function(e) {
        console.log(e.target.value);
        if (e.target.value == 'oneWay') {
            $('#returnDate').hide();
        } else {
            $('#returnDate').show();
        }
    });

});

function objectifyForm(formArray) { //serialize data function

    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}

function getQuote() {
    $("#air_btn_submit").text("Submitting");
    $("#air_btn_submit").attr("disabled", "disabled");
    var data = $("#quoteForm").serializeArray();
    var inputData = objectifyForm(data);
    if (inputData.email == "") {
        alert("Please enter Email Id");
        $("#air_btn_submit").text("Get Quote");
        $("#air_btn_submit").removeAttr("disabled");
    } else {
        $.ajax({
            type: 'POST',
            url: "api/sendemail",
            data: JSON.stringify(inputData),
            dataType: 'json',
            contentType: "json",
            success: function(d) {
                console.log(d);
                alert('Quote Request sent successfully! We will contact you soon!');
                $("#air_btn_submit").text("Submitted");
                setTimeout(function(){
                    $("#air_btn_submit").text("Get Quote");
                    $("#air_btn_submit").removeAttr("disabled");
                }, 3000);
            },
            error: function(err) {
                $("#air_btn_submit").text("Try Again");
                    $("#air_btn_submit").removeAttr("disabled");
                console.log("error");
            }
        });
    }
    console.log(inputData);

}

function getTourQuote() {
    $("#tour_btn_submit").text("Submitting");
    $("#tour_btn_submit").attr("disabled", "disabled");
    var data = $("#tourQuoteForm").serializeArray();
    var inputData = objectifyForm(data);
    if (inputData.email == "") {
        alert("Please enter Email Id");
        $("#tour_btn_submit").text("Get Quote");
        $("#tour_btn_submit").removeAttr("disabled", "disabled");
    } else {
        $.ajax({
            type: 'POST',
            url: "api/sendTourQuote",
            data: JSON.stringify(inputData),
            dataType: 'json',
            contentType: "json",
            success: function(d) {
                console.log(d);
                $("#tour_btn_submit").text("Submitted");
                setTimeout(function(){
                    $("#tour_btn_submit").text("Get Quote");
                    $("#tour_btn_submit").removeAttr("disabled");
                }, 3000);
                
                alert('Quote Request sent successfully! We will contact you soon!')
            },
            error: function(err) {
                $("#tour_btn_submit").text("Try Again");
                $("#tour_btn_submit").removeAttr("disabled");
                console.log("error");
            }
        });
    }
}