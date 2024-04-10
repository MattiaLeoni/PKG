jQuery(document).ready(function(){

    const app = (() => {
        let body;
        let menu;
        let menuItems;
        
        const init = () => {
            body = document.querySelector('body');
            html = document.querySelector('html');
            menu = document.querySelector('#header-hamburger');
            menuItems = document.querySelectorAll('.modal-menu__list-item');
            applyListeners();
        }
        
        const applyListeners = () => {
            menu.addEventListener('click', () => toggleClass(body, 'nav-active'));
            menu.addEventListener('click', () => toggleClass(html, 'nav-active'));
        }
        
        const toggleClass = (element, stringClass) => {
            if(element.classList.contains(stringClass))
                element.classList.remove(stringClass);
            else
                element.classList.add(stringClass);
        }
        
        init();
    })();

});