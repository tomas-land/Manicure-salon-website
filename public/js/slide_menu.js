const menu_btn = document.querySelector('.hamburger');
const slide_menu = document.querySelector('.slide_menu');

menu_btn.addEventListener('click', function(){
    menu_btn.classList.toggle('is-active');
    slide_menu.classList.toggle('is-active');
    
});