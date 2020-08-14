//search by name
// function search() {
//     var input, filter, table, tr, td, i, txtValue;
//     input = document.getElementById("search");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("table_mahasiswa");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//         td = tr[i].getElementsByTagName("td")[0];
//         if (td) {
//             txtValue = td.textContent || td.innerText;
//             if (txtValue.toUpperCase().indexOf(filter) > -1) {
//                 tr[i].style.display = "";
//             } else {
//                 tr[i].style.display = "none";
//             }
//         }       
//     }
// }

//sorting
function GetFormattedDate(date) {
    if(date == ''){
        date = new Date().toJSON().slice(0,10);
        var dd = date.substr(8, 2);
        var mm = date.substr(5, 2);
        var yyyy = date.substr(0, 4);

        date = dd + '-' + mm + '-' + yyyy;
    }
    var d = date.toString().split("-");
    var newDate = new Date(+d[2], d[1] - 1, +d[0]);
    return newDate;
}

function sortTable(n, stat) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    if(stat) {
        table = document.getElementById("table_student");
    } else {
        table = document.getElementById("table_teacher");
    }
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc"; 
    /*Make a loop that will continue until no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare, one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if(n == 4) {
                x = GetFormattedDate(x.innerHTML);
                y = GetFormattedDate(y.innerHTML);
            } 
            if(!stat) {
                if(n == 7 || n == 8){
                    x = GetFormattedDate(x.innerHTML);
                    y = GetFormattedDate(y.innerHTML);
                }
            }
            /*check if the two rows should switch place, based on the direction, asc or desc:*/
            if (dir == "asc") {
                if(isNaN(x)){
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    } 
                } else {
                    if(stat) {
                        if(n != 4){
                            if (Number(x.innerHTML) > Number(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (x > y) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        }
                    } else {
                        if(n != 4 && n != 7 && n != 8){
                            alert("here")
                            if (Number(x.innerHTML) > Number(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (x > y) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        }
                    }
                }
            } else if (dir == "desc") {
                if(isNaN(x)){
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    } 
                } else {
                    if(stat) {
                        if(n != 4){
                            if (Number(x.innerHTML) < Number(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (x < y) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else {
                        if(n != 4 && n != 7 && n != 8){
                            if (Number(x.innerHTML) < Number(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (x < y) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                } 
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;      
        } else {
            /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}


//daterange
// $(function() {
//     $('input[name="daterange"]').daterangepicker({
//         opens: 'right',
//         autoUpdateInput: false,
//         locale: {
//             cancelLabel: 'Clear'
//         }
//     });

//     $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
//         //apply value to <input>
//         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
//         var fromDate, toDate, filter, table, tr, td, i, txtValue;
//         fromDate = $(this).value.substr(0, $(this).value.indexOf(' '));
//         toDate = $(this).valule.substr($(this).value.indexOf('-') + 2);
//         //filter

//         filter = input.value.toUpperCase();
//         table = document.getElementById("table_mahasiswa");
//         tr = table.getElementsByTagName("tr");
//         for (i = 0; i < tr.length; i++) {
//             td = tr[i].getElementsByTagName("td")[0];
//             if (td) {
//                 txtValue = td.textContent || td.innerText;
//                 if (txtValue.toUpperCase().indexOf(filter) > -1) {
//                     tr[i].style.display = "";
//                 } else {
//                     tr[i].style.display = "none";
//                 }
//             }       
//         }
//     });

//     $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
//         $(this).val('');
//     });
// });