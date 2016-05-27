$(document).ready(function(){

    // Modal init
    $('.modal-trigger').leanModal();

    // Firebase
    var messagesRef = new Firebase('https://empowersoft-user.firebaseio.com/');
    var ageField = $('#age');
    var ip;
    var age, sex;
    $.getJSON("http://ip-api.com/json/?callback=?", function(data){
        ip = data.query;
        region = data.regionName;

        // Register user
        messagesRef.orderByChild("ip").equalTo(ip).on("child_added", function(snapshot) {
            age = snapshot.val().age;
            sex = snapshot.val().sex;
            key = snapshot.key();
            if (key==null){
                window.setTimeout(function(){
                    $('#modal').openModal();
                }, 4000);
            }
            if (sex==1){
                $('#sex').html(' barbat');
                $('#barbat').attr('checked', 'checked');
            }
            else{
                $('#sex').html(' femeie');
                $('#femeie').attr('checked', 'checked');
            }
            $('#year').html(age);
            $("#age-label").html("");
            $('#age').val(age);

            // Get statistics personal data
            obj ={};
            obj.region = region;
            obj.sex = sex;
            obj.age= age;
            $.ajax({
                url: 'php/data.php',
                data: obj,
                dataType:'html',
                success:function(obj){
                    date = jQuery.parseJSON(obj)
                    $("#romani").html(date[0]);
                    $("#durata").html(date[1]);
                    $("#nascuti").html(date[2]);
                    $("#decedati-judet").html(date[3]);
                    $("#decedati-varsta").html(date[4]);
                }
            });

        });
    });

    // Update user
    $("#submit").click(function(e){
        messagesRef.orderByChild("ip").equalTo(ip).on("child_added", function(snapshot){
            key = snapshot.key();
            if (key==null){
                var sex = $('input[name=sex]:checked').val()
                var age = ageField.val();
                messagesRef.push({ip:ip, age:age, sex:sex});
            }
            else{
                var sex = $('input[name=sex]:checked').val()
                var age = ageField.val();
                messagesRef.child(key).child('age').set(age);
                messagesRef.child(key).child('sex').set(sex);
                if (sex==1){
                    $('#sex').html(' barbat');
                    $('#barbat').attr('checked', 'checked');
                }
                else{
                    $('#sex').html(' femeie');
                    $('#femeie').attr('checked', 'checked');
                }
                $('#year').html(age);
                $("#age-label").html("");
                $('#age').val(age);
            }
        });
    });

    // Reset button
    $("#reset").click(function(){
        $('#age').val("");
        $("input[name=sex]").attr("checked", false);
    });

});
