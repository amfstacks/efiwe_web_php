// scripts/dashboard.js

document.addEventListener('DOMContentLoaded', () => {
    const userEmailSpan = document.getElementById('user-email');
    const logoutButton = document.getElementById('logout-button');

    // Retrieve user data from localStorage
    const user = JSON.parse(localStorage.getItem('user'));

    if (user && user.email) {
        userEmailSpan.textContent = user.email;
    } else {
        // If no user data, redirect to signin page
        alert('You are not signed in. Please sign in first.');
        window.location.href = 'signin.html';
    }

    logoutButton.addEventListener('click', () => {
        // Clear user data from localStorage
        localStorage.removeItem('user');
        // Redirect to signin page
        window.location.href = 'signin.html';
    });
});
