$(document).ready(function () {
    $(document).on("submit", "form.form-inline", function (e) {
        e.preventDefault();
        console.log('wow');
        var form = $(e.target);
        var data = new FormData(this);
        $.ajax({
            url: '/chat/send', // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data:new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                updateMessages();
                document.getElementById("input1").value = "";
            }
        });
    });


    // $(document).on("click", "#testo", function (e) {
    //     e.preventDefault();
    //     // alert('wow');
    //     // var form = $(e.target);
    //     var a = $('#chislo').val();
    //     $.ajax({
    //         url: '/test/mama-mia', // Url to which the request is send
    //         type: "GET",             // Type of request to be send, called as method
    //         data: {a: a}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    //         // contentType: false,       // The content type used when sending data to the server.
    //         cache: false,             // To unable request pages to be cached
    //         success: function (data)   // A function to be called if request succeeds
    //         {
    //             console.log(data);
    //         }
    //     });
    // });
});
function func() {
    $.ajax({
        url: '/chat/update', // Url to which the request is send
        type: "POST",
        dataType: 'json',// Type of request to be send, called as method
        cache: false,             // To unable request pages to be cached
        success: function (data)   // A function to be called if request succeeds
        {
            var users='';
            for(var i=0;i<data.length;i++){
                users=users+'<p class="users"><font color="#f8f8ff">'+data[i]+'</font></p>';
            }
            $("#users").html(users);
        }
    });
}
$(document).ready(function () {
    func();
    setInterval(func,1000*60*5);
});


function updateMessages() {
    $.ajax({
        url: '/chat/is-new-messages', // Url to which the request is send
        type: "POST",
        dataType: 'json',// Type of request to be send, called as method
        cache: false,             // To unable request pages to be cached
        success: function (data)   // A function to be called if request succeeds
        {
            var messages='';
            for(var i=0;i<data.length;i++){
                messages=messages+'<p><span><b><font color="#fff8dc">'+data[i]['author']+'</font></b><font color="#f5fffa">:</font><font color="#fff8dc">'+data[i]['text']+'</font></span></p>';
            }
            $("#messages").append(messages);
            var block = document.getElementById("messages");
            block.scrollTop = block.scrollHeight;
        }

    });
}
$(document).ready(function () {
    updateMessages();
    setInterval(updateMessages,1000*2);
});


function checkConnection() {
    $.ajax({
        url: '/site/connection', // Url to which the request is send
        type: "POST",
        dataType: 'json',// Type of request to be send, called as method
        cache: false,             // To unable request pages to be cached
        success: function (data)   // A function to be called if request succeeds
        {
            $("#connection").html("");
        },
        error :function (data) {
            $("#connection").html("<p><font color='#f8f8ff'>Соединение с сервером пропало. Проверьте свое подключение к Интернету</font></p>");
        }
    });
}

$(document).ready(function ()
    checkConnection();
    setInterval(checkConnection,1000);
});