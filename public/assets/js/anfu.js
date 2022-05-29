function epscheck() {

  var checkBox = document.getElementById("apieps");

  if (checkBox.checked == true) {
    document.getElementById('epscal1').disabled = false;
    document.getElementById('epscal2').disabled = false;
  } else {
    document.getElementById('epscal1').disabled = true;
    document.getElementById('epscal2').disabled = true;
  }
}

function percheck() {

  var checkBox = document.getElementById("apiper");

  if (checkBox.checked == true) {
    document.getElementById('percal1').disabled = false;
    document.getElementById('percal2').disabled = false;
  } else {
    document.getElementById('percal1').disabled = true;
    document.getElementById('percal2').disabled = true;
  }
}

function pbvcheck() {

  var checkBox = document.getElementById("apipbv");

  if (checkBox.checked == true) {
    document.getElementById('pbvcal1').disabled = false;
    document.getElementById('pbvcal2').disabled = false;
  } else {
    document.getElementById('pbvcal1').disabled = true;
    document.getElementById('pbvcal2').disabled = true;
  }
}

function roecheck() {

  var checkBox = document.getElementById("apiroe");

  if (checkBox.checked == true) {
    document.getElementById('roecal1').disabled = false;
    document.getElementById('roecal2').disabled = false;
  } else {
    document.getElementById('roecal1').disabled = true;
    document.getElementById('roecal2').disabled = true;
  }
}

function dycheck() {

  var checkBox = document.getElementById("apidy");

  if (checkBox.checked == true) {
    document.getElementById('dycal1').disabled = false;
    document.getElementById('dycal2').disabled = false;
  } else {
    document.getElementById('dycal1').disabled = true;
    document.getElementById('dycal2').disabled = true;
  }
}

function dercheck() {

  var checkBox = document.getElementById("apider");

  if (checkBox.checked == true) {
    document.getElementById('dercal1').disabled = false;
    document.getElementById('dercal2').disabled = false;
  } else {
    document.getElementById('dercal1').disabled = true;
    document.getElementById('dercal2').disabled = true;
  }
}