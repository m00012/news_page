/*
*  Name: Mekides Kasse 
*  Assignment: Final MVC + AJAX
*  Purpose: Creatig dynamic pages using codeigniter framework, main.js
*/

"use strict";
// Clears the form inputs and message area
function clearForm() {
    $('#name').val('');
    $('#remail1').val('');
    $('#remail2').val('');
    $('#subject').val('');
    $('#message').val('');
    $('#msg').html('<br>'); // Reset the message area
}

// Sends data to the server using AJAX
function sendData(name, remail1, subject, message) {
    let msgArea = document.getElementById("msg");

    $.ajax({
        url: 'Ajax/processnames', 
        type: 'POST',
        data: { name: name, remail1: remail1, subject: subject, message: message },
        success: function (val) {
            console.log(val);
            if (val === 'okay') {
                clearForm();
                msgArea.innerHTML = "Your message was sent successfully. Thank You!";
            } else {
                msgArea.innerHTML = val; // Display error msg
            }
        },
        error: function () {
            msgArea.innerHTML = "Server error. Please try again later.";
        }
    });

    return;
}

// Validates input and calls sendData if valid
function validate() {
    let message = "";

    let msgArea = document.getElementById("msg");
    let name = $('#name').val().trim();
    let remail1 = $('#remail1').val().trim();
    let remail2 = $('#remail2').val().trim();
    let subject = $('#subject').val().trim();
    let msg = $('#message').val().trim();

    // Reset trimmed values to the form
    $('#name').val(name);
    $('#remail1').val(remail1);
    $('#remail2').val(remail2);
    $('#subject').val(subject);
    $('#message').val(msg);

    // Email validation pattern
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Validate fields
    if (name === "") {
        message += "Name cannot be empty.<br>";
    }
    if (!emailPattern.test(remail1)) {
        message += "Please enter a valid return email address.<br>";
    }
    if (remail1 !== remail2) {
        message += "Emails do not match.<br>";
    }
    if (subject === "") {
        message += "Subject cannot be empty.<br>";
    }
    if (msg === "") {
        message += "Message cannot be empty.<br>";
    }

    if (message === "") {
        // If no errors, send data
        sendData(name, remail1, subject, msg);
    } else {
        // Display errors
        msgArea.innerHTML = message;
    }

    return;
}

// Document ready function
$(document).ready(function () {

    const maxChars = 1000;

    // Display the initial character count
    $('#chars').text('0');

    // Event listener for the message input field to track typing
    $('#message').on('input', function () {
        let currentLength = $(this).val().length;
        let remainingChars = maxChars - currentLength;
        
        // Update the character count
        $('#chars').text(currentLength);

    });

    // Event handler for the clear button
    $("#clear").click(function () {
        clearForm();
    });

    // Event handler for the send button
    $("#send").click(function (e) {
        e.preventDefault(); 
        validate();
    });

    // Menu toggle functionality
    $(".menu-toggle").on("click", function () {
        $(".menu-links").toggleClass("active");
    });

});
