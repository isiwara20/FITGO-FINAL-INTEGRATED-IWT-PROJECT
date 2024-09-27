// JavaScript to handle button click events
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.button');

    buttons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            alert('More information coming soon!');
        });
    });
});
