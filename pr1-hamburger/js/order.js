var form = document.getElementById('form');
var button = document.querySelector('#order');

form.addEventListener("submit", function (e) {
   e.preventDefault();

    var name = 'name=' + document.querySelector('input[name="name"]').value;
    var phone = 'phone=' + (document.querySelector('input[name="phone"]').value).replace(/\s/g, '');
    var email = 'email=' + document.querySelector('input[name="email"]').value;
    var street = 'street=' + document.querySelector('input[name="street"]').value;
    var home = 'home=' + document.querySelector('input[name="home"]').value;
    var part = 'part=' + document.querySelector('input[name="part"]').value;
    var appt = 'appt=' + document.querySelector('input[name="appt"]').value;
    var floor = 'floor=' + document.querySelector('input[name="floor"]').value;
    var payment = 'payment=' + document.querySelector('input[name="payment"]').value;
    var callback = 'callback=' + document.querySelector('input[name="callback"]').value;
    var comment = 'comment=' + document.querySelector('textarea[name="comment"]').value;
    var data = [name, phone, email, street, home, part, appt, floor, callback, payment, comment].join("&");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "order.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
});
