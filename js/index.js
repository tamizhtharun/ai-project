
const modal = document.getElementById('staticBackdrop');
const loginbtn = document.getElementById('login-btn');
const signupbtn = document.getElementById('signup-btn');
const signinForm = document.getElementById('signin-form');
const signupForm = document.getElementById('signup-form');
const signupLink = document.getElementById('signup-link');
const signinLink = document.getElementById('signin-link');
const btnclose = document.getElementById('btn-close');
const closebtn = document.querySelector(".seller-close");
console.log(closebtn);
const sellerRegister = document.getElementById('seller-register')
const sellerBtn = document.getElementById('seller-btn');
const signinBtn = document.getElementById('signin-btn');
const loginlink = document.getElementById('loginlink')


// Add event listeners to the links
signupLink.addEventListener('click', () => {
  signinForm.style.display = 'none';
  signupForm.style.display = 'block';
  signinForm.reset();
});

signinLink.addEventListener('click', () => {
  signinForm.style.display = 'block';
  signupForm.style.display = 'none';
  signupForm.reset();
  sellerPasswordError.textContent = '';
  passwordError.textContent = '';
  emailErrorMessageElement.textContent = '';
  errorMessageElement.textContent = '';
  
  
});
loginlink.addEventListener('click', ()=>{
    signinForm.style.display = 'block';
    signupForm.style.display = 'none';
})

btnclose.addEventListener('click' , () => {
  signinForm.reset();
  signupForm.reset();
  sellerRegistrationForm.reset();
  sellerRegistrationForm.reset();
  errorMessageElement.textContent = '';
  emailErrorMessageElement.textContent = '';
  emailErrorMessage.textContent = '';
  passwordError.textContent = '';
  sellerphoneError.textContent = '';
  selleremailerror.textContent = '';
  sellerPasswordError.textContent='';
})

loginbtn.addEventListener('click', () =>{
  signinForm.style.display = 'block';
  signupForm.style.display = 'none';
  resetform.style.display = 'none'
})


//phone number check at signup
const phoneNumberInput = document.getElementById('phone-number');
const errorMessageElement = document.getElementById('error-message');

phoneNumberInput.addEventListener('input', () => {
  const phoneNumber = phoneNumberInput.value;
  const phoneNumberRegex = /^[0-9]{10}$/;

  if (!phoneNumberRegex.test(phoneNumber)) {
    errorMessageElement.textContent = 'Invalid phone number';
    errorMessageElement.style.color = 'red';
    signupbtn.disabled = true;
  } else {
    errorMessageElement.textContent = '';
    signupbtn.disabled = false;
  }
});
phoneNumberInput.addEventListener('input', () => {
  if (phoneNumberInput.value === '') {
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
    signupbtn.disabled = true;
  } else {
    emailErrorMessageElement.textContent = '';
    signupbtn.disabled = false;
  }
});
emailInput.addEventListener('input', () => {
  if (emailInput.value === '') {
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
    signinBtn.disabled = true;
  } else {
    emailErrorMessage.textContent = '';
    signinBtn.disabled = false;
  }
});
Inputemail.addEventListener('input', () => {
  if (Inputemail.value === '') {
    emailErrorMessage.textContent = '';
  }
});
signupLink.addEventListener('click' , () =>{
  emailErrorMessage.textContent = '';
})
Inputemail.style.marginBottom = '1px'


//running txt

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
            signupbtn.disabled = true;
        } else {
            passwordError.style.color = 'green';
            passwordError.innerHTML = 'Strong password!';
            signupbtn.disabled = false;
        }
    });
    passwordInput.addEventListener('input', () => {
      if (passwordInput.value === '') {
        passwordError.textContent = '';
      }
    });


  //seller registration form

  //seller modal
const sellerRegistrationModal = new bootstrap.Modal(document.getElementById('seller-registration-modal'));
const sellerRegistrationForm = document.getElementById('seller-form'); // get the form element


sellerBtn.addEventListener('click', () => {
  sellerRegistrationModal.show();

  closebtn.addEventListener('click', () => {
    sellerRegistrationForm.reset();
    sellerphoneError.textContent='';
    selleremailerror.textContent='';
    sellerPasswordError.textContent='';
  });
});
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
    sellerRegister.disabled = true;
  } else {
    sellerPasswordError.style.color = 'green';
    sellerPasswordError.innerHTML = 'Strong password!';
    sellerRegister.disabled = false;
  }
});
sellerPasswordInput.addEventListener('input', () => {
  if (sellerPasswordInput.value === '') {
    sellerPasswordError.textContent = '';
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
    sellerRegister.disabled = true;
  } else {
    selleremailerror.textContent = '';
    sellerRegister.disabled = false;
  }
});
sellerInputemail.addEventListener('input', () => {
  if (sellerInputemail.value === '') {
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
    sellerRegister.disabled = true;
  } else {
    sellerphoneError.textContent = '';
    sellerRegister.disabled = false;
  }
});
SellerPhone.addEventListener('input', () => {
  if (SellerPhone.value === '') {
    sellerphoneError.textContent = '';
  }
});
SellerPhone.style.marginBottom = '1px';


document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth > 992) {
    
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
    
            everyitem.addEventListener('mouseover', function(e){
    
                let el_link = this.querySelector('a[data-bs-toggle]');
    
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }
    
            });
            everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');
    
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }
    
    
            })
        });
    
    }
    // end if innerWidth
    }); 
    // DOMContentLoaded  end

//swiper live bidding
 var swiper = new Swiper('.slider-wrapper', {
      loop: true,
      grabCursor: true,
      spaceBetween: 30,
    
      //mouse play
      mousewheel: {
        invert: false,
        releaseOnEdges: true,
        forceToAxis: true
      },

  // Autoplay
  autoplay: {
    delay: 3000, // delay between slides in milliseconds
    disableOnInteraction: false, // disable autoplay when user interacts with the slider
  },

      // Pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true
      },

         
      // Navigation
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    
      // Responsive
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 3
        }
      }
    });
    //timer
    // Set the end time for the bid (in milliseconds)
const bidEndTime = new Date('2024-08-23T14:30:00.000Z').getTime();

// Update the time every second
setInterval(function() {
  const currentTime = new Date().getTime();
  const timeDiff = bidEndTime - currentTime;
  
  // Calculate the time difference in hours, minutes, and seconds
  const hours = Math.floor(timeDiff / (1000 * 60 * 60));
  const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
  
  // Update the time display
  document.getElementById('bid-ends-in-time').innerHTML = `${hours}h ${minutes}m ${seconds}s`;
}, 1000);


$('.dropdown-item').hover(function() {
  $(this).find('.sub-dropdown-menu').slideDown();
}, function() {
  $(this).find('.sub-dropdown-menu').slideUp();
});

//category
document.addEventListener("DOMContentLoaded", function() {
  const carousel = document.querySelector(".carousel");
  const arrowBtns = document.querySelectorAll(".wrapper i");
  const wrapper = document.querySelector(".wrapper");

  const firstCard = carousel.querySelector(".cat-product-list-card");
  const firstCardWidth = firstCard.offsetWidth;

  let isDragging = false,
      startX,
      startScrollLeft,
      timeoutId;

  const dragStart = (e) => { 
      isDragging = true;
      carousel.classList.add("dragging");
      startX = e.pageX;
      startScrollLeft = carousel.scrollLeft;
  };

  const dragging = (e) => {
      if (!isDragging) return;
  
      // Calculate the new scroll position
      const newScrollLeft = startScrollLeft - (e.pageX - startX);
  
      // Check if the new scroll position exceeds 
      // the carousel boundaries
      if (newScrollLeft <= 0 || newScrollLeft >= 
          carousel.scrollWidth - carousel.offsetWidth) {
          
          // If so, prevent further dragging
          isDragging = false;
          return;
      }
  
      // Otherwise, update the scroll position of the carousel
      carousel.scrollLeft = newScrollLeft;
  };

  const dragStop = () => {
      isDragging = false; 
      carousel.classList.remove("dragging");
  };

  const autoPlay = () => {
  
      // Return if window is smaller than 800
      if (window.innerWidth < 800) return; 
      
      // Calculate the total width of all cards
      const totalCardWidth = carousel.scrollWidth;
      
      // Calculate the maximum scroll position
      const maxScrollLeft = totalCardWidth - carousel.offsetWidth;
      
      // If the carousel is at the end, stop autoplay
      if (carousel.scrollLeft >= maxScrollLeft) return;
      
      // Autoplay the carousel after every 2500ms
      timeoutId = setTimeout(() => 
          carousel.scrollLeft += firstCardWidth, 2500);
  };

  carousel.addEventListener("mousedown", dragStart);
  carousel.addEventListener("mousemove", dragging);
  document.addEventListener("mouseup", dragStop);
  wrapper.addEventListener("mouseenter", () => 
      clearTimeout(timeoutId));
  wrapper.addEventListener("mouseleave", autoPlay);

  // Add event listeners for the arrow buttons to 
  // scroll the carousel left and right
  arrowBtns.forEach(btn => {
      btn.addEventListener("click", () => {
          carousel.scrollLeft += btn.id === "left" ? 
              -firstCardWidth : firstCardWidth;
      });
  });
});