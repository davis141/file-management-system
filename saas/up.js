
let idleTime = 0;
const idleLimit = 1800;
setInterval(timerIncrement, 1000);

window.onload = resetIdleTime;
window.onmousemove = resetIdleTime;
window.onmousedown = resetIdleTime; 
window.ontouchstart = resetIdleTime; 
window.onclick = resetIdleTime; 
window.onkeydown = resetIdleTime;
window.addEventListener('scroll', resetIdleTime, true); 

function timerIncrement() {
    idleTime++;
    if (idleTime >= idleLimit) { // If idle for more than idleLimit seconds, redirect to login
        window.location.href = "/file-management-system/saas/logout/logout.php";
    }
}

function resetIdleTime() {
    idleTime = 0; 
}

setInterval(function() {
    fetch('/file-management-system/saas/update-sess.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.cookie = `session_key=${data.newKey}; path=/`;
            } else {
                window.location.href = "/file-management-system/saas/logout/logout.php";
            }
        });
}, 10000); 

