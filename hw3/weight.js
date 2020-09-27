var report = function (kg, lb) {
    document.getElementById("result").innerHTML =
        kg + " kg = " + lb + " lb";
};

document.getElementById("kg_to_lb").onclick = function () {
    var kg = document.getElementById("weight").value;
    report(kg, kg*2.2);
};

document.getElementById("lb_to_kg").onclick = function () {
    var lb = document.getElementById("weight").value;
    report(lb/2.2, lb);
};