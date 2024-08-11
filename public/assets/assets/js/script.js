document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const dropdownMenus = document.querySelectorAll('.drop-menu');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const parentLi = this.parentElement;
            const dropdown = this.nextElementSibling;

            if (parentLi.classList.contains('active-hover')) {
                // If the dropdown is already active-hover, remove the active-hover class
                parentLi.classList.remove('active-hover');
                dropdown.classList.add('d-none');
            } else {
                // Remove 'active-hover' class from all dropdowns
                dropdownToggles.forEach(t => t.parentElement.classList.remove('active-hover'));
                dropdownMenus.forEach(menu => menu.classList.add('d-none'));

                // Add 'active-hover' class to the clicked dropdown
                parentLi.classList.add('active-hover');
                dropdown.classList.remove('d-none');
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const bars = document.querySelector('.bars');
    const sidebar = document.querySelector('#sidebar');

    // Toggle sidebar visibility on bars click
    bars.addEventListener('click', function () {
        sidebar.classList.toggle('show');
    });

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!sidebar.contains(event.target) && !bars.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });
});
