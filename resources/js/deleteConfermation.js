const deleteForms = document.querySelectorAll('form.deleter');

deleteForms.forEach((form) => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const name = form.getAttribute('data-element-name');
        const confirmPopUp = window.confirm(`Are you sure you want to delete ${name}?`);
        if (confirmPopUp) this.submit();
    })
});