function redirectToPage() {
    let searchTerm = document.querySelector('.search-bar input[name="search"]').value;
    // Rediriger vers la page de votre choix
    window.location.href = 'search.php?search=' + encodeURIComponent(searchTerm);
    return false;
}

