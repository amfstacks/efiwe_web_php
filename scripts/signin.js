// scripts/signin.js

document.addEventListener('DOMContentLoaded', () => {
    const signinForm = document.getElementById('signin-form');
    const signinMessage = document.getElementById('signin-message');

    signinForm.addEventListener('submit', async (e) => {
        e.preventDefault(); // Prevent form from submitting the traditional way

        // Get form values
        const email = document.getElementById('signin-email').value.trim();
        const password = document.getElementById('signin-password').value.trim();

        // Simple validation
        if (!email || !password) {
            signinMessage.style.color = 'red';
            signinMessage.textContent = 'Please enter both email and password.';
            return;
        }

        try {
            const response = await fetch('https://fayabase.com/efiwe/api/signin', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (response.ok) {
                signinMessage.style.color = 'green';
                signinMessage.textContent = 'Signin successful! Redirecting to Dashboard...';
                // Save token or user data as needed (e.g., localStorage)
                localStorage.setItem('user', JSON.stringify(data));
                // Redirect to dashboard after a short delay
                setTimeout(() => {
                    window.location.href = 'dashboard.html';
                }, 2000);
            } else {
                // Handle errors returned by the API
                signinMessage.style.color = 'red';
                signinMessage.textContent = data.message || 'Signin failed. Please check your credentials.';
            }
        } catch (error) {
            console.error('Error:', error);
            signinMessage.style.color = 'red';
            signinMessage.textContent = 'An error occurred. Please try again later.';
        }
    });
});
