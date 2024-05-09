const parallax_el = document.querySelectorAll(".parallax");

let xValue = 0,
    yValue = 0;

let rotateDegree = 0;

function update(cursorPosition) {
    parallax_el.forEach((el) => {
        let speedX = parseFloat(el.dataset.speedx) || 0;
        let speedY = parseFloat(el.dataset.speedy) || 0;
        let speedZ = parseFloat(el.dataset.speedz) || 0;

        let isInLeft = parseFloat(getComputedStyle(el).left) < window.innerWidth / 2 ? 1 : -1;
        let zValue = (cursorPosition - parseFloat(getComputedStyle(el).left)) * isInLeft * 0.1;

        el.style.transform = `translateX(calc(-50% + ${xValue * speedX}px)) translateY(calc(-50% + ${yValue * speedY}px)) rotate(${rotateDegree}deg) perspective(2300px) translateZ(${zValue * speedZ}px)`;
    });
}

function handleMouseMove(e) {
    xValue = e.clientX - window.innerWidth / 2;
    yValue = e.clientY - window.innerHeight / 2;

    rotateDegree = (xValue / (window.innerWidth / 2)) * 0.5;

    update(e.clientX);
}

update(0);

window.addEventListener("mousemove", handleMouseMove);

let timeline = gasp.timeline();

parallax_el.forEach(el =>{
    timeline.from(".bg-img",{
        top:'${+document.querySelector(".big-img").offsetHight / 2 + el.dataset.distance}px',
        duration: 1,
     },
     "1"
     );

})

// Assuming you fetch the user's name after successful login
const loggedInUser = "John Doe"; // Replace this with the actual logged-in user's name

// Show the logged-in user's name
document.getElementById("loggedInUserName").textContent = loggedInUser;
document.getElementById("loggedInUserName").style.display = "inline";






