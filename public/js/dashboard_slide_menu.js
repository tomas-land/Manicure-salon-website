let hide_menu_arrow = document.getElementById('hide_menu_arrow');
        hide_menu_arrow.addEventListener('click', (e) => {
            e.target.classList.toggle('arrow-rotate');
            let sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('sidebar-closed');
            let menu_icons = document.querySelectorAll('.icon');
            menu_icons.forEach(icon => {
                icon.classList.toggle('sidebar-link-move');
            });
            let logo = document.querySelector('.logo');
            logo.classList.toggle('logo-opacity');


        })