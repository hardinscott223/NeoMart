$(() => {
  const $loading = $("#loading");
  const $registerBtn = $("#registerBtn");
  const $form = $("form");

  $loading.hide();

  $registerBtn.on("click", (e) => {
    e.preventDefault();

    const username = $("#username").val().trim();
    const email = $("#email").val().trim();
    const password = $("#password").val();
    const confirmpassword = $("#confirmpassword").val();

    // Clear previous error messages
    $(".error-message").remove();

    if (!username) {
      showErrorMessage("Username is required", "#username");
    }

    if (!email) {
      showErrorMessage("Email is required", "#email");
    }

    if (!password) {
      showErrorMessage("Password is required", "#password");
    }

    if (password !== confirmpassword) {
      showErrorMessage("Passwords do not match", "#confirmpassword");
    }

    if ($(".error-message").length === 0) {
      $loading.show();
      $registerBtn.prop("disabled", true);

      $.ajax({
        type: "POST",
        url: "../server/auth/register.php",
        data: {
          username: username,
          email: email,
          password: password,
          confirmpassword: confirmpassword,
        },
        dataType: "json",
        success: function (response) {
          $loading.hide();
          $registerBtn.prop("disabled", false);

          if (response.success) {
            showSuccess(response.message);
            setTimeout(() => {
              window.location.href = "login.php";
            }, 2000);
          } else {
            response.errors.forEach((error) => {
              showErrorMessage(error);
            });
          }
        },
        error: function (xhr, status, error) {
          try {
            const response = JSON.parse(xhr.responseText);
            console.error("Error:", response.error);
          } catch (e) {
            console.error("Error:", xhr.responseText);
          }
        },
      });
    }
  });

  function showErrorMessage(message, id) {
    const errorMsg = $("<div>")
      .addClass("alert alert-danger error-message")
      .text(message);
    $(id).after(errorMsg);
  }

  function showSuccess(message) {
    const successDiv = $("<div>")
      .addClass("alert alert-success error-message")
      .text(message);
    $form.prepend(successDiv);
  }
});
