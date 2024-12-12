var slider = document.querySelector('.slider');
var itemPerView = 5;
var positionCurrent = 0;
let itemHeight = 0;

function nextSlide() {
    var items = document.querySelectorAll('.itemal');
    itemHeight = items[0].offsetHeight;
    if (positionCurrent > (itemPerView - items.length) * itemHeight) {
        positionCurrent -= itemHeight; // Di chuyển xuống
    } else {
        positionCurrent = 0; // Quay lại đầu
    }
    slider.style.transform = `translateY(${positionCurrent}px)`; // Di chuyển slider
}

function prevSlide() {
    var items = document.querySelectorAll('.itemal');
    itemHeight = items[0].offsetHeight;
    if (items.length > itemPerView) {
        if (positionCurrent === 0) {
            positionCurrent = -1 * (items.length - itemPerView) * itemHeight; // Di chuyển lên
        } else {
            positionCurrent += itemHeight; // Di chuyển lên
        }
    } else {
        positionCurrent = 0;
    }
    slider.style.transform = `translateY(${positionCurrent}px)`; // Di chuyển slider
}