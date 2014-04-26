
function add_resident(){
    var jkey = localStorage.length + 1;

    var entry = { 
        lname: document.getElementById("lname").value, 
        fname : document.getElementById("fname").value,
        address : document.getElementById("address").value,
        phone1 : document.getElementById("phone1").value,
        phone2 : document.getElementById("phone2").value 
    };

    localStorage.setItem(jkey, JSON.stringify(entry));

/*
    var test2 = localStorage.getItem("test");
    test = JSON.parse(test2);

    console.log("=======================");
    for (var i = 0; i < localStorage.length; i++){
        console.log("local " + i +  " " + localStorage.getItem(localStorage.key(i)));
    }
*/
}

function export_residents(){
    var output = document.getElementById("output");
    var test = JSON.stringify(localStorage);
    console.log(test);
    output.innerHTML=test;
}

function list_residents(){
    var output = document.getElementById("output");
    for (var i = 0; i < localStorage.length; i++){
        var res = localStorage.getItem(localStorage.key(i))
        var obj = jQuery.parseJSON( res );
//        var list_residents = JSON.stringify(localStorage.key(i));
        console.log(obj.fname);
        
        output.appendChild(obj.fname);
    }

    var list_residents = JSON.stringify(localStorage);
}
