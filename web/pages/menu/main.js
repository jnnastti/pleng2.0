function limparRota() {
    window.history.pushState({}, document.title, window.location.pathname);
}