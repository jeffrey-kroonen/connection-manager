let imported = document.createElement('script');
imported.src = `${URL}/assets/bootstrap/dist/js/bootstrap.js`;
document.head.appendChild(imported);

document.createElement('script');
imported.src = `${URL}/assets/bootstrap/dist/js/bootstrap.bundle.min.js`;
document.head.appendChild(imported);

/**
 * Tooltip.
 */
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })