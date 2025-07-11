
// Register POST Request
$(document).ready(function () {
  $('.register-form').submit(function (event) {
    event.preventDefault();

    // Get password and confirm password values
    var password = $('#password').val();
    var confirmPassword = $('#confirm_password').val();

    // check if they match
    if (password !== confirmPassword) {
      alert('Passwords do not match!');
      $('.error-message').text('The password does not matched!')
      return;
    }
    // check if the password is more than 8 digit
    if (password.trim().length < 8) {
      alert('The password is too short!');
      $('.error-message').text('The password is too short!')
      return;
    }
    // check if the password has at least 1 uppercase and 1 lowercase letter
    if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
      alert('Password must include at least 1 uppercase and 1 lowercase letter!');
      $('.error-message').text('Password must include at least 1 uppercase and 1 lowercase letter!');
      return;
    }
    // check if the password has at least 1 special character
    if (!/[\W_]/.test(password)) {
      alert('Password must include at least 1 special character!');
      $('.error-message').text('Password must include at least 1 special character!');
      return;
    }

    var formData = $(this).serialize();

    // Send the POST request
    $.ajax({
      url: '../utils/register.php',
      type: 'POST',
      data: formData,
      success: function (response) {
        try {
          var data = JSON.parse(response);
          if (data.error) {
            alert('Register failed: ' + data.error);
            $('.error-message').text(data.error)
          } else {
            alert('Register successful!');
            window.location.href = "/";
          }
        } catch (e) {
          alert('Unexpected response from server.');
          $('.error-message').text(response)
        }
      },
      error: function (jqXHR) {
        let obj;
        try {
          obj = JSON.parse(jqXHR.responseText);
        } catch (e) {
          obj = { error: 'Unknown error occurred.' };
        }
        alert('Failed to submit the form: ' + obj.error);
        $('.error-message').text(obj.error)
      }
    });
  });
});

// Login POST Request
$(document).ready(function () {
  $('.login-form').submit(function (event) {
    event.preventDefault();

    var formData = $(this).serialize();

    // Send the POST request
    $.ajax({
      url: '../utils/login.php',
      type: 'POST',
      data: formData,
      success: function (response) {
        try {
          var data = JSON.parse(response);
          if (data.error) {
            alert('Login failed: ' + data.error);
            $('.error-message').text(data.error)
          } else {
            alert('Login successful!');
            window.location.href = "/";
          }
        } catch (e) {
          alert('Unexpected response from server.');
          $('.error-message').text('Unexpected response from server.')
        }
      },
      error: function (jqXHR) {
        const obj = JSON.parse(jqXHR.responseText);
        alert('Failed to submit the form: ' + obj.error);
        $('.error-message').text(obj.error)
      }
    });

  });
});