let box = 1;
// let boxLeft = box - 1;
// if (boxLeft < 1) boxLeft = 3;
// let boxRight = box + 1;
// if (boxRight > 3) boxRight = 1;

function next() {
    //box1 to 2
    //box1 logic
    document.querySelector(`#box${box}`).classList.remove("active");
    document.querySelector(`#box${box}`).classList.add("back");
    //above box becomes boxLeft
    //box2 logic
    box++;
    if (box > 3) {
        box = 1;
        // document.querySelector(`#box${box}`).classList.add("active");
    }
    document.querySelector(`#box${box}`).classList.add("active");
    //above box becomes current box
    //box3 logic
    let boxRight = box + 1;
    if (boxRight > 3) boxRight = 1;
    document.querySelector(`#box${boxRight}`).classList.remove("back");
    //above box becomes boxRight
}
function prev() {
    //box3 to 2
    //box3 logic
    document.querySelector(`#box${box}`).classList.remove("active");
    //box1
    box--;
    if (box < 1) {
        box = 3;
        document.querySelector(`#box${box}`).classList.remove("back");
        document.querySelector(`#box${box}`).classList.add("active");
    }
    document.querySelector(`#box${box}`).classList.remove("back");
    document.querySelector(`#box${box}`).classList.add("active");
    //box2 logic
    // box--;
    // if (box < 1) {
    //     box = 3;
    // }
    let boxRight = box + 1;
    if (boxRight > 3) {
        boxRight = 1;
        document.querySelector(`#box${boxRight}`).classList.remove("active");
        document.querySelector(`#box${boxRight}`).classList.add("back");
    }
    document.querySelector(`#box${boxRight}`).classList.remove("active");
    document.querySelector(`#box${boxRight}`).classList.add("back");
}

document.querySelector("#next").onclick = next;
document.querySelector("#prev").onclick = prev;

// setInterval(next, 4000);
