function glow_bulb() {
    //checking the inputs from input box
    let bulb__input = document.getElementById("bulb__input").value;
    for (let i = 1; i <= 7; i++) {
        let bulb__spans = document.getElementById(i);
        bulb__spans.classList.remove('bulbs__glow');
    }

    // logic to glow bulbs
    if (bulb__input > 0 && bulb__input < 8) {
        for (let i = bulb__input; i <= 7; i++) {
            let bulb__spans = document.getElementById(i);
            bulb__spans.classList.add('bulbs__glow');
        }
    }
}