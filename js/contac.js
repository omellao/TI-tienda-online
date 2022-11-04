var num = 0;
function contactNone() {
    // let t2 = document.getElementById("contac");

    if (num == 0) {
        document.getElementById("contac").style.display = "block";
        num = 1;
    } else {
        document.getElementById("contac").style.display = "none";
        num = 0;
    }
}
