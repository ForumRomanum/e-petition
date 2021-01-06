const signSection = jq('.sign-section').first();
const footer = jq('footer').first();

function checkOffset() {
  const {top: footerOffsetTop} = footer.offset();
  let newPosition = 'fixed';
  if (window.innerWidth < 720
    && window.innerHeight > footerOffsetTop) {

    newPosition = 'relative';
  }
  signSection.css('position', newPosition);
}

window.addEventListener('scroll', checkOffset);
window.addEventListener('resize', checkOffset);
