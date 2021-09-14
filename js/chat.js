function set_chat() {
    if (typeof XMLHttpRequest != "undefined") {
        oxmlHttpSend = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if (oxmlHttpSend == null) {
        alert('browser dese not support  XML http request');
        return;
    }
    var url = "chat_send.php";
    var strname = "noname";
    var strmsg = "";
    if ($('#name' != null)) {
        strname = $('#name').val();
        $('#name').readOnly = true;
    }
    if ($('#msg') != null) {
        strmsg = $('#msg').val();
        $('#msg').val() = "";
    }
    url += "?name=" + strname + "&msg=" + strmsg;
    oxmlHttpSend.open("GET", url, true);
    oxmlHttpSend.send(null);
}