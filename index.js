
const modal = document.getElementById('staticBackdrop');
const signinForm = document.getElementById('signin-form');
const signupForm = document.getElementById('signup-form');
const signupLink = document.getElementById('signup-link');
const signinLink = document.getElementById('signin-link');

// Add event listeners to the links
signupLink.addEventListener('click', () => {
  signinForm.style.display = 'none';
  signupForm.style.display = 'block';
});

signinLink.addEventListener('click', () => {
  signinForm.style.display = 'block';
  signupForm.style.display = 'none';
});


//phone number check at signup
const phoneNumberInput = document.getElementById('phone-number');
const errorMessageElement = document.getElementById('error-message');

phoneNumberInput.addEventListener('input', () => {
  const phoneNumber = phoneNumberInput.value;
  const phoneNumberRegex = /^[0-9]{10}$/;

  if (!phoneNumberRegex.test(phoneNumber)) {
    errorMessageElement.textContent = 'Invalid phone number';
    errorMessageElement.style.color = 'red';
  } else {
    errorMessageElement.textContent = '';
  }
});
phoneNumberInput.style.marginBottom = '1px';

//email check at signup page
const emailInput = document.getElementById('email');
const emailErrorMessageElement = document.getElementById('email-error-message');

emailInput.addEventListener('input', () => {
  const email = emailInput.value;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailRegex.test(email)) {
    emailErrorMessageElement.textContent = 'Invalid email address';
    emailErrorMessageElement.style.color = 'red';
  } else {
    emailErrorMessageElement.textContent = '';
  }
});
emailInput.style.marginBottom = '1px'

//email check for signin page
const Inputemail = document.getElementById('mail');
const emailErrorMessage = document.getElementById('email-error');

Inputemail.addEventListener('input', () => {
  const email = Inputemail.value;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailRegex.test(email)) {
    emailErrorMessage.textContent = 'Invalid email address';
    emailErrorMessage.style.color = 'red';
  } else {
    emailErrorMessage.textContent = '';
  }
});
Inputemail.style.marginBottom = '1px'

const marquee = document.getElementById('marquee');

    // Load the text from the file
    fetch('text.txt')
      .then(response => response.text())
      .then(text => {
        marquee.innerHTML = text;
      })
      .catch(error => console.error('Error loading text:', error));