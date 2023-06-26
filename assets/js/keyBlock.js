$(function () {
    $(this).bind("contextmenu", function (e) {
        event.preventDefault();
    });
});

function killCopy(e) { return false }
function reEnable() { return true }
document.onselectstart = new Function("return false");
if (window.sidebar) {
    document.onmousedown = killCopy;
    document.onclick = reEnable;
}

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }else if (event.ctrlKey && event.shiftKey && event.keyCode == 'I'.charCodeAt(0)) {
        return false;
    }else if (event.ctrlKey && event.shiftKey && event.keyCode == 'J'.charCodeAt(0)) {
        return false;
    }else if (event.ctrlKey && event.keyCode == 'U'.charCodeAt(0)) {
        return false;
    }else if (event.ctrlKey && event.shiftKey && event.keyCode == 'C'.charCodeAt(0)) {
        return false;
    }
});



