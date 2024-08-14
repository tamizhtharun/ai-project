
const modal = document.getElementById('staticBackdrop');
const signinForm = document.getElementById('signin-form');
const signupForm = document.getElementById('signup-form');
const passwordResetForm = document.getElementById('reset-form');
const signupLink = document.getElementById('signup-link');
const signinLink = document.getElementById('signin-link');
const forgotPasswordLink = document.getElementById('forgot-password-link');
const backToLoginLink = document.getElementById('back-to-login-link');

// Add event listeners to the links
signupLink.addEventListener('click', () => {
  signinForm.style.display = 'none';
  signupForm.style.display = 'block';
});

signinLink.addEventListener('click', () => {
  signinForm.style.display = 'block';
  signupForm.style.display = 'none';
});

forgotPasswordLink.addEventListener('click', () => {
  signinForm.style.display = 'none';
  passwordResetForm.style.display = 'block';
});

backToLoginLink.addEventListener('click', () => {
  signinForm.style.display = 'block';
  passwordResetForm.style.display = 'none';
});



//seller modal
const sellerBtn = document.getElementById('seller-btn');
const sellerRegistrationModal = new bootstrap.Modal(document.getElementById('seller-registration-modal'));

sellerBtn.addEventListener('click', () => {
  sellerRegistrationModal.show();
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

//strong password
//signup form
const passwordInput = document.getElementById('password');
    const passwordError = document.getElementById('password-error');

    passwordInput.addEventListener('input', () => {
        const password = passwordInput.value;
        let errorMessage = '';

        if (password.length < 8) {
            errorMessage += '<br>- Password should be at least 8 characters long.';
        }

        if (!/[a-z]/.test(password)) {
            errorMessage += '<br>- Password should contain at least one lowercase letter.';
        }

        if (!/[A-Z]/.test(password)) {
            errorMessage += '<br>- Password should contain at least one uppercase letter.';
        }

        if (!/[0-9]/.test(password)) {
            errorMessage += '<br>- Password should contain at least one number.';
        }

        if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            errorMessage += '<br>- Password should contain at least one special character.';
        }

        if (errorMessage) {
            passwordError.style.color = 'red';
            passwordError.innerHTML = errorMessage;
        } else {
            passwordError.style.color = 'green';
            passwordError.innerHTML = 'Strong password!';
        }
    });
  //seller registration form
  const sellerPasswordInput = document.getElementById('seller-password');
const sellerPasswordError = document.getElementById('seller-password-error');

sellerPasswordInput.addEventListener('input', () => {
  const password = sellerPasswordInput.value;
  let errorMessage = '';

  if (password.length < 8) {
    errorMessage += '<br>- Password should be at least 8 characters long.';
  }

  if (!/[a-z]/.test(password)) {
    errorMessage += '<br>- Password should contain at least one lowercase letter.';
  }

  if (!/[A-Z]/.test(password)) {
    errorMessage += '<br>- Password should contain at least one uppercase letter.';
  }

  if (!/[0-9]/.test(password)) {
    errorMessage += '<br>- Password should contain at least one number.';
  }

  if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
    errorMessage += '<br>- Password should contain at least one special character.';
  }

  if (errorMessage) {
    sellerPasswordError.style.color = 'red';
    sellerPasswordError.innerHTML = errorMessage;
  } else {
    sellerPasswordError.style.color = 'green';
    sellerPasswordError.innerHTML = 'Strong password!';
  }
});

//seller valid email
//seller valid email
const sellerInputemail = document.getElementById('seller-email');
const selleremailerror = document.getElementById('sellerEmailError');

sellerInputemail.addEventListener('input', () => {
  const selleremail = sellerInputemail.value;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailRegex.test(selleremail)) {
    selleremailerror.textContent = 'Invalid email address';
    selleremailerror.style.color = 'red';
  } else {
    selleremailerror.textContent = '';
  }
});
sellerInputemail.style.marginBottom = '1px'

//seller valid phone
const SellerPhone = document.getElementById('seller-phone');
const sellerphoneError = document.getElementById('sellerphoneError');

SellerPhone.addEventListener('input', () => {
  const sellerphoneNumber = SellerPhone.value;
  const phoneRegex = /^[0-9]{10}$/;

  if (!phoneRegex.test(sellerphoneNumber)) {
    sellerphoneError.textContent = 'Invalid phone number';
    sellerphoneError.style.color = 'red';
  } else {
    sellerphoneError.textContent = '';
  }
});
SellerPhone.style.marginBottom = '1px';