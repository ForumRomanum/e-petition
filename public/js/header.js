(() => {
  element('header .links .toggle-form')
    .addEventListener('click', () =>
      toggleClass(element('header form'), 'show'));
})();
