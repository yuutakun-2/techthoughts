let box = 1;

function next() {
    document.querySelector(`#box${box}`).style.display = "none";
    box++;
    if (box > 3) box = 1;
    document.querySelector(`#box${box}`).style.display = "block";
}
function prev() {
    document.querySelector(`#box${box}`).style.display = "none";
    box--;
    if (box < 1) box = 1;
    document.querySelector(`#box${box}`).style.display = "block";
}
document.querySelector("#next").onclick = next;
document.querySelector("#prev").onclick = prev;

setInterval(next, 4000);
