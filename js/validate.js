document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Get form values
    const name = document.getElementById('inputName').value;
    const email = document.getElementById('inputEmail').value;
    const phone = document.getElementById('inputPhone').value;
    const subject = document.getElementById('inputSubject').value;
    const message = document.getElementById('inputMessage').value;
    const agreement = document.getElementById('inputAgreement').checked;

    // Regex for email and phone validation
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    const phoneRegex = /^\d{10}$/;

    // Validation logic
    if (name === '') {
        alert('Please enter your name.');
        return;
    }
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email.');
        return;
    }
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid phone number (10 digits).');
        return;
    }
    if (subject === '') {
        alert('Please enter a subject.');
        return;
    }
    if (message === '') {
        alert('Please enter your message.');
        return;
    }
    if (!agreement) {
        alert('You must agree to the terms and conditions.');
        return;
    }

    alert('Form submitted successfully!');
    
    document.getElementById('inputName').value = '';
    document.getElementById('inputEmail').value = '';
    document.getElementById('inputPhone').value = '';
    document.getElementById('inputSubject').value = '';
    document.getElementById('inputMessage').value = '';
    document.getElementById('inputAgreement').checked = false;
});