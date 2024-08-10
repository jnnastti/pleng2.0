// var offset = [0,0];
// var divOverlay;
// var isDown = false;

// function overlay(el) {
//     el.addEventListener('mousedown', function(e) {
//         isDown = true;
//         offset = [
//             el.offsetLeft - e.clientX,
//             el.offsetTop - e.clientY
//         ];

//         divOverlay = el;
//     }, true);
// }


// document.addEventListener('mouseup', function() {
//     isDown = false;
//     divOverlay.style.position = 'block'
// }, true);

// document.addEventListener('mousemove', function(e) {
//     event.preventDefault();
//     if (isDown) {
//         divOverlay.style.position = 'absolute';
//         divOverlay.style.left = (e.clientX + offset[0]) + 'px';
//         divOverlay.style.top  = (e.clientY + offset[1]) + 'px';
//     }
// }, true);