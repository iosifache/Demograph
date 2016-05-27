$(document).ready(function(){

    // Firebase
    var messagesRef = new Firebase('https://dazzling-torch-2802.firebaseio.com/');
    var messageField = $('#messageInput');
    var nameField = $('#nameInput');
    var messageList = $('#example-messages')

    // Add messages to Firebase;
     messageField.keypress(function (e) {
        if (e.keyCode == 13) {
            var username = nameField.val();
            var message = messageField.val();
            messagesRef.push({name:username, text:message});
            messageField.val('');
        }
    });

    // Display messages from Firebase
    messagesRef.limitToLast(10).on('child_added', function (snapshot) {
        var data = snapshot.val();
        var username = data.name || "Anonymous";
        var message = data.text;
        var messageElement = $("<li class='collection-item'><i class='material-icons small'>recent_actors</i>");
        var nameElement = $("<b class='chat-title'></b>");
        nameElement.text(username);
        messageElement.append("<p class='chat-message'>" + message + "</p>").append(nameElement);
        messageList.append(messageElement);
        messageList[0].scrollTop = messageList[0].scrollHeight;
    });
    
});
