function checkGrade() {
    var grade = document.getElementById("grades");
    var subgrade = document.getElementById("subgrades");
    var sg = document.getElementsByClassName("subgrade");
    var major = document.getElementById("majors");
    var form = document.getElementById("formmajor");
    var classes = document.getElementById("classes");

    subgrade.disabled = false;
    empty(subgrade);
    classes.disabled = true;
    empty(classes);

    if(grade.value == 4) {
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

    hideNShow(sg, 0, sg.length, true);
    switch(grade.value) {
        case '1': hideNShow(sg, 0, 2, false); break;
        case '2': hideNShow(sg, 2, 8, false); break;
        case '3': hideNShow(sg, 8, 11, false); break;
        case '4': hideNShow(sg, 11, 14, false);
    }
}

function checkSubgrade() {
    var subgrade = document.getElementById("subgrades");
    var major = document.getElementById("majors");
    var classes = document.getElementById("classes");
    var classroom = document.getElementsByClassName("classroom");

    classes.disabled = false;
    empty(classes);

    hideNShow(classroom, 0, classroom.length, true);
    switch(subgrade.value) {
        case '1': hideNShow(classroom, 53, 55, false); break;
        case '2': hideNShow(classroom, 55, 57, false); break;
        case '3': hideNShow(classroom, 29, 33, false); break;
        case '4': hideNShow(classroom, 33, 37, false); break;
        case '5': hideNShow(classroom, 37, 41, false); break;
        case '6': hideNShow(classroom, 41, 45, false); break;
        case '7': hideNShow(classroom, 45, 49, false); break;
        case '8': hideNShow(classroom, 49, 53, false); break;
        case '9': hideNShow(classroom, 20, 23, false); break;
        case '10': hideNShow(classroom, 23, 26, false); break;
        case '11': hideNShow(classroom, 26, 29, false); break;
        default: checkMajor();
    }
}

function checkMajor() {
    var subgrade = document.getElementById("subgrades");
    var major = document.getElementById("majors");
    var classes = document.getElementById("classes");
    var classroom = document.getElementsByClassName("classroom");

    empty(classes);

    hideNShow(classroom, 0, classroom.length, true);
    switch(subgrade.value) {
        case '12': 
            switch(major.value) {
                case '1': hideNShow(classroom, 0, 3, false); break;
                case '2': hideNShow(classroom, 3, 6, false); break;
                case '3': hideNShow(classroom, 6, 8, false); break;
                default: hideNShow(classroom, 0, 8, false);
            }; break;
        case '13': 
            switch(major.value) {
                case '1': hideNShow(classroom, 8, 10, false); break;
                case '2': hideNShow(classroom, 10, 12, false); break;
                case '3': hideNShow(classroom, 12, 14, false); break;
                default: hideNShow(classroom, 8, 14, false);
            }; break;
        case '14': 
            switch(major.value) {
                case '1': hideNShow(classroom, 14, 16, false); break;
                case '2': hideNShow(classroom, 16, 18, false); break;
                case '3': hideNShow(classroom, 18, 20, false); break;
                default: hideNShow(classroom, 14, 20, false);
            };
    }
}

function checkClass() {
    var m = document.getElementsByClassName("major");
    var classes = document.getElementById("classes");
    
    if(classes.value.indexOf("ma") !== -1){
        if(classes.value.substring(3, 4).includes("1")) {
            m[0].selected = true;
            m[1].selected = false;
            m[2].selected = false;
        } else if(classes.value.substring(3, 4).includes("2")) {
            m[0].selected = false;
            m[1].selected = true;
            m[2].selected = false;
        } else if(classes.value.substring(3, 4).includes("3")) {
            m[0].selected = false;
            m[1].selected = false;
            m[2].selected = true;
        }
    }
}

function hideNShow(e, n, m, val) {
    for(i = n; i < m; i++) {
        e[i].hidden = val;
    }
}

function empty(input) {
    input.selectedIndex = 0;
}