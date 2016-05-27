$(document).ready(function(){

    // Firebase
    var messagesRef = new Firebase('https://empowersoft-contact.firebaseio.com/');
    var numeField = $('#nume');
    var prenumeField = $('#prenume');
    var emailField = $('#email');
    var adresaField = $('#adresa');
    var mesajField = $('#mesaj');

    // Submit 
    $("#submit").click(function(e){
        var nume = numeField.val();
        var prenume = prenumeField.val();
        var email = emailField.val();
        var adresa = adresaField.val();
        var mesaj = mesajField.val();
        messagesRef.push({nume:nume, prenume:prenume, email:email, adresa:adresa, mesaj:mesaj});
        $('#contact')[0].reset();
    });

});
