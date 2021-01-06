(() => {
  const button = jq('header .links .toggle-form');
  const form = jq('header form');
  button.on('click', () => form.toggleClass('show'));
})();
