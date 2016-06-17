/** Created by Luca on 16/06/2016 at 18:22. **/
/** This file is responsible for managing client-side controls. **/
var macLength = 17;
var pinLength = 8;

function checkRegistrationValues() {
    var mac = document.getElementById("MAC").value;
    var email = document.getElementById("Email").value;
    var pin = document.getElementById("Pin").value;
    var conf_pin = document.getElementById("ConfirmPin").value;

    if( (mac == "") || (email == "") || (pin == "") || (conf_pin == "") ) {
        window.alert("You miss a field! Please fill it before send your request!");
        return false;
    }
    if( (mac.length != macLength) || !validMAC(mac) ) {
        window.alert("Invalid MAC address! It must have this form: \"aa:bb:cc:dd:ee:ff\"");
        return false;
    }
    if(!validEmail(email)) {
        window.alert("You inserted an invalid email address!");
        return false;
    }
    if( (pin.length != pinLength) || (conf_pin.length != pinLength) ) {
        window.alert("You inserted an Invalid PIN!");
        return false;
    }
	if( ! checkPinsEqual() ) {
		window.alert("The PIN and the confirmation PIN must match! Please check it!");
		return false;
	}
    return true;
}

function checkPinsEqual() {
    var pwd1 = document.getElementById("Pin").value;
    var pwd2 = document.getElementById("ConfirmPin").value;
    var img = document.getElementById("imgpwd");

    var toRet;
    if(pwd1===pwd2) {
        img.setAttribute("src", "./images/right.png");
        toRet=true;
    }
    else {
        img.setAttribute("src", "./images/wrong.png");
        toRet=false;
    }
    img.style.visibility = "visible";
    return toRet;
}

function checkLoginValues(){
    var email = document.getElementById("Email").value;
    var pin = document.getElementById("Pin").value;

	if( (email=="")||(pin=="") ) {
        window.alert("You miss a field! Please fill it before send your request!");
        return false;
    }
    if(!validEmail(email)) {
        window.alert("You inserted an invalid email address!");
        return false;
    }
    if(pin.length != pinLength) {
        window.alert("You inserted an Invalid PIN!");
        return false;
    }

	return true;
}

function validEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validMAC(MAC) {
    var re = /^(([A-Fa-f0-9]{2}[:-]){5}[A-Fa-f0-9]{2}[,]?)+$/;
    return re.test(MAC);
}