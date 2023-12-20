function redirectToPage() {
    let searchTerm = document.querySelector('#search-bar').value;
    // Rediriger vers la page de votre choix
    window.location.href = 'search.php?search=' + encodeURIComponent(searchTerm);
    return false;
}

function redirectToSerieInfos(id) {
    window.location.href = 'serie-infos.php?id=' + id;
}
