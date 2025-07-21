document.addEventListener('DOMContentLoaded', function () {
  const signUpButton = document.getElementById('signUpButton');
  const newApplicantButton = document.getElementById('NewApplicantButton');
  const signInForm = document.getElementById('signIn');
  const signUpForm = document.getElementById('signup');

  if (signUpButton && newApplicantButton && signInForm && signUpForm) {
    signUpButton.addEventListener('click', function () {
      signInForm.style.display = "none";
      signUpForm.style.display = "block";
    });

    newApplicantButton.addEventListener('click', function () {
      signInForm.style.display = "block";
      signUpForm.style.display = "none";
    });
  } else {
    console.warn("Toggle elements not found in DOM.");
  }
});
