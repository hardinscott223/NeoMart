$(() => {
  $loading = $("#loading");
  $loading.hide();

  $("#registerBtn").on("click", (e) => {
    e.preventDefault();

    // Clear any previous error messages
    $(".error-message").remove();

    // Basic validation
    const username = $("#username").val().trim();
    const email = $("#email").val().trim();
    const password = $("#password").val();
    const confirmpassword = $("#confirmpassword").val();

    // Validate inputs
    if (!username || !email || !password || !confirmpassword) {
      showError("All fields are required");
      return;
    }

    if (password !== confirmpassword) {
      showError("Passwords do not match");
      return;
    }

    $loading.show();
    $("#registerBtn").prop("disabled", true);

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
        $("#registerBtn").prop("disabled", false);

        if (response.success) {
          // Show success message
          showSuccess(response.message);
          // Redirect to login page after 2 seconds
          setTimeout(() => {
            window.location.href = "login.php";
          }, 2000);
        } else {
          showError(response.message || "Registration failed");
        }
      },
      error: function (xhr, status, error) {
        $loading.hide();
        $("#registerBtn").prop("disabled", false);
        showError("An error occurred. Please try again later.");
        console.error("Error:", error);
      },
    });
  });

  // Helper function to show error messages
  function showError(message) {
    const errorDiv = $("<div>")
      .addClass("alert alert-danger error-message")
      .text(message);
    $("form").prepend(errorDiv);
  }

  // Helper function to show success messages
  function showSuccess(message) {
    const successDiv = $("<div>")
      .addClass("alert alert-success error-message")
      .text(message);
    $("form").prepend(successDiv);
  }
});
