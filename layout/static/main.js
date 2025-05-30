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
});
