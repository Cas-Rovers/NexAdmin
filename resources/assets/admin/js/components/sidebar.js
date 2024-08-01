document.addEventListener('DOMContentLoaded', () => {
    const sidebarCloseBtn = document.querySelector('.navigation-collapse');
    const sidebar = document.querySelector(sidebarCloseBtn.getAttribute('data-collapse-target'));

    sidebarCloseBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
});
