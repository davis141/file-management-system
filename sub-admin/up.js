
let idleTime = 0;
const idleLimit = 1800; // seconds

// Increment the idle time counter every second.
setInterval(timerIncrement, 1000);

// Reset the idle timer when user activity is detected.
window.onload = resetIdleTime;
window.onmousemove = resetIdleTime;
window.onmousedown = resetIdleTime; // captures touchpad clicks
window.ontouchstart = resetIdleTime; // captures touchscreen taps
window.onclick = resetIdleTime; // captures touchpad/mouse clicks
window.onkeydown = resetIdleTime; // captures keyboard input
window.addEventListener('scroll', resetIdleTime, true); // captures scrolling

function timerIncrement() {
    idleTime++;
    if (idleTime >= idleLimit) { // If idle for more than idleLimit seconds, redirect to login
        window.location.href = "/file-management-system/saas/logout/logout.php";
    }
}

function resetIdleTime() {
    idleTime = 0; // reset idle time to 0 on user activity
}

// Session update function
setInterval(function() {
    fetch('/file-management-system/sub-admin/update-sess.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update session key in the client (e.g., cookie or JavaScript variable)
                document.cookie = `session_key=${data.newKey}; path=/`;
            } else {
                // Handle session update failure, e.g., redirect to login
                window.location.href = "/file-management-system/sub-admin/logout/logout.php";
            }
        });
}, 10000); // Update every 10 seconds

