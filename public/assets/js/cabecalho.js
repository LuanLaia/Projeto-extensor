function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
  }
  document.addEventListener('click', function (e) {
    const btn = document.querySelector('.dropdown-toggle');
    const menu = document.getElementById('dropdownMenu');

    if (!btn.contains(e.target) && !menu.contains(e.target)) {
      menu.style.display = 'none';
    }
  });