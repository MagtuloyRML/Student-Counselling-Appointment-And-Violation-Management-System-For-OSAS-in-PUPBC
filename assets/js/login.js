//student variable login//
var login_stud = document.getElementById("login_student");
var loginBtn = document.getElementById("stud_btn");
var closebtn = document.getElementsByClassName("bttn back")[0];
var login_select = document.getElementById("selection");

//pag click ng student, lalabas ang login form nya//
loginBtn.onclick = function() {
    login_stud.style.display = "block";
    login_select.style.display = "none";
  }
closebtn.onclick = function() {
    login_stud.style.display = "none";
    login_select.style.display = "block";
  }

//student variable registration//
var reg_stud = document.getElementById("reg_student");
var regBtn = document.getElementById("reg_stud_btn");
var closeregbtn = document.getElementsByClassName("bttn regback")[0];
var login_std = document.getElementById("login_student");

//pag click ng student, lalabas ang login form nya//
regBtn.onclick = function() {
    reg_stud.style.display = "flex";
    login_std.style.display = "none";
  }
closeregbtn.onclick = function() {
    reg_stud.style.display = "none";
    login_std.style.display = "block";
  }

//admin variable login//
var login_adm = document.getElementById("login_admin");
var loginBttn = document.getElementById("admin_btn");
var closebttn = document.getElementsByClassName("bttn back1")[0];
var login_select = document.getElementById("selection");

//pag click ng admin, lalabas ang login form nya//
loginBttn.onclick = function() {
    login_adm.style.display = "block";
    login_select.style.display = "none";
  }
  closebttn.onclick = function() {
    login_adm.style.display = "none";
    login_select.style.display = "block";
  }


//admin variable registration//
var reg_adm = document.getElementById("reg_admin");
var admin_regBttn = document.getElementById("reg_admin_btn");
var closeregbttn = document.getElementsByClassName("closebtn_reg_admin")[0];
var login_regis = document.getElementById("login_admin");

//pag click ng admin, lalabas ang login form nya//
admin_regBttn.onclick = function() {
    reg_adm.style.display = "flex";
    login_regis.style.display = "none";
  }
  closeregbttn.onclick = function() {
    reg_adm.style.display = "none";
    login_regis.style.display = "block";
  }