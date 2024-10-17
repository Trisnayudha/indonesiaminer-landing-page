function resizePage() {
    if ($('#sidebar-wrapper').hasClass('open')) {
        let pageWidth = $(window).width() - 240;
        let windowWidth = $(window).width();
        if ($(window).width() < 1199) {
            $('#page-content-wrapper').css('width', `${windowWidth}px`);
        } else {
            $('#page-content-wrapper').css('width', `${pageWidth}px`);
        }
    } else {
        let pageWidth = $(window).width();
        $('#page-content-wrapper').css('width', `${pageWidth}px`);
    }
}
$(document).ready(function () {
    resizePage();
    function openSidebar() {
        let windowsWidth = $(window).width();
        if (windowsWidth < 1199) {
            $('#sidebar-wrapper').removeClass('open');
        } else {
            $('#sidebar-wrapper').addClass('open');
        }
    }
    openSidebar()
    $(window).resize(function () { 
        resizePage();
        openSidebar();
    });
    
});

$('.sidebar-menu.tree .menu').click(function (e) { 
    e.preventDefault();
    let parentId = '#' + $(this).parent().attr('id');
    $(parentId).toggleClass('open');
});

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.getElementById('sidebar-wrapper').classList.toggle('open');
            localStorage.setItem('sb|sidebar-toggle', document.getElementById('sidebar-wrapper').classList.contains('open'));
            resizePage()
        });
    }

});