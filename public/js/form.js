function checkgrade() {
    var grade = document.getElementById("grade");
    var major = document.getElementById("majors");
    var form = document.getElementById("formmajor");
    var input = document.getElementById("classroom");
    if(grade.value == 5) {
        major.required = true;
        major.disabled = false;
        var att = document.createAttribute("class");
        att.value = "input-group";
        form.setAttributeNode(att);
    } else {
        major.required = false;
        major.disabled = true;
        empty(major);
        form.removeAttribute("class");
    }
    var check = [];
    var hide = document.getElementsByClassName("hide");
    for(var i = 0; i < hide.length; i++)
        check[i] = hide[i].getAttribute("data-check-grade");
    for(var i = 0; i < hide.length; i++) {
        if(check[i] == grade.value)
            hide[i].hidden = false;
        else
            hide[i].hidden = true;
    }
    empty(input);
}

function checkmajor() {
    var major = document.getElementById("majors");
    var hide = document.getElementsByClassName("hide");
    var input = document.getElementById("classroom");
    if(major.value == 1) 
        hidenshow(hide, "IPA");
    else if(major.value == 2) 
        hidenshow(hide, "IPS");
    else if(major.value == 3) 
        hidenshow(hide, "BAHASA");
    empty(input);
}

function checkclass() {
    var classes = document.getElementById("classroom");
    var major = document.getElementById("major");
    if(classes.value.indexOf("ma") !== -1){
        if(classes.value.substring(3, 4).includes("1")) {
            major.value = 1;
            major.innerHTML = "IPA";
        } else if(classes.value.substring(3, 4).includes("2")) {
            major.value = 2;
            major.innerHTML = "IPS";
        } else if(classes.value.substring(3, 4).includes("3")) {
            major.value = 3;
            major.innerHTML = "BAHASA";
        }
    }
}

function hidenshow(hide, string) {
    for(var i = 37; i < hide.length; i++) {
        if(hide[i].innerHTML.indexOf(string) !== -1)
            hide[i].hidden = false;
        else
            hide[i].hidden = true;
    }
}

function empty(input) {
    input.selectedIndex = 0;
}