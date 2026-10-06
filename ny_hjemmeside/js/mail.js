// Viser mailadressen, som står baglæns i data-mail, så spam-robotter ikke finder den.
document.querySelectorAll('a[data-mail]').forEach((a) => {
  const mail = a.dataset.mail.split('').reverse().join('');
  a.href = 'mailto:' + mail;
  a.textContent = mail;
});
