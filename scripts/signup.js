// scripts/signup.js

document.addEventListener('DOMContentLoaded', () => {
    const signupForm = document.getElementById('signup-form');
    const signupMessage = document.getElementById('signup-message');

    signupForm.addEventListener('submit', async (e) => {
        e.preventDefault(); // Prevent form from submitting the traditional way

        // Get form values
        const email = document.getElementById('signup-email').value.trim();
        const password = document.getElementById('signup-password').value.trim();

        // Simple validation
        if (!email || !password) {
            signupMessage.style.color = 'red';
            signupMessage.textContent = 'Please enter both email and password.';
            return;
        }

        try {
            const response = await fetch('https://fayabase.com/efiwe/api/signup', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (response.ok) {
                signupMessage.style.color = 'green';
                signupMessage.textContent = 'Signup successful! Redirecting to Sign In...';
                // Redirect to signin after a short delay
                setTimeout(() => {
                    window.location.href = 'signin.html';
                }, 2000);
            } else {
                // Handle errors returned by the API
                signupMessage.style.color = 'red';
                signupMessage.textContent = data.message || 'Signup failed. Please try again.';
            }
        } catch (error) {
            console.error('Error:', error);
            signupMessage.style.color = 'red';
            signupMessage.textContent = 'An error occurred. Please try again later.';
        }
    });
});
