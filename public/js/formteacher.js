function checkGrade() {
    var grade = document.getElementById("gradet");
    var hide = document.getElementsByClassName("hidect");
    document.getElementById("courset").removeAttribute("disabled");

    // var tk = ['4','22','23','24','25'];
    // for(var i = 0; i < hide.length; i++) {
    //     if(hide[i].value.contains(tk)) {
    //         var filter = [hide[i].value];
    //     }
    // }
    // console.log(filter);
    
    if(grade.value == '1') {
        for(var i = 0; i < hide.length; i++) {
            if(i != 3 && i < 21) hide[i].hidden = true;
            else hide[i].hidden = false;
        }
    } else if(grade.value == '2') {
        for(var i = 0; i < hide.length; i++) {
            if(i > 10) hide[i].hidden = true;
            else hide[i].hidden = false;
        }
    } else if(grade.value == '3') {
        for(var i = 0; i < hide.length; i++) {
            if(i > 11) hide[i].hidden = true;
            else hide[i].hidden = false;
        }
    } else if(grade.value == '4') {
        for(var i = 0; i < hide.length; i++) {
            if( i == 1 || i == 4 || i == 10 || i > 20) hide[i].hidden = true;
            else hide[i].hidden = false;
        }
    } else document.getElementById("courset").setAttribute("disabled", "disabled");
}

function empty() {
    checkGrade();
    document.getElementById("courset").selectedIndex = 0;
}

function sortSelect(selElem) {
    var tmpAry = new Array();
    for (var i = 0; i < selElem.options.length; i++) {
        tmpAry[i] = new Array();
        tmpAry[i][0] = selElem.options[i].text;
        tmpAry[i][1] = selElem.options[i].value;
    }
    tmpAry.sort();
    while (selElem.options.length > 0) {
        selElem.options[0] = null;
    }
    for (var i = 0; i < tmpAry.length; i++) {
        var op = new Option(tmpAry[i][0], tmpAry[i][1]);
        selElem.options[i] = op;
    }
    return;
}