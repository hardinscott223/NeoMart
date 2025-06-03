$(document).ready(function ($) {
  let token = document.head.querySelector('meta[name="csrf-token"]');
  if (token) {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": token.content,
      },
    });
  } else {
    console.error("CSRF Token not found.");
  }
  const showErrorMessage = (message, id) => {
    const errorMsg = $("<div>")
      .addClass("alert alert-danger error-message")
      .text(message);
    $(id).prepend(errorDiv);
  };
});
