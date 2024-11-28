document.addEventListener('wpcf7mailsent', function(event) {
  console.log(event.detail.contactFormId);
  if (event.detail.contactFormId === 248) {
    window.location.href = '/thanks';

  }
}, false);