// Viser billederne stort, når man klikker på dem (PhotoSwipe 5).
// Alle links med data-pswp-width inde i .galleri bliver en del af samme galleri.
import PhotoSwipeLightbox from './photoswipe/photoswipe-lightbox.esm.min.js';

const lightbox = new PhotoSwipeLightbox({
  gallery: '.galleri',
  children: 'a[data-pswp-width]',
  pswpModule: () => import('./photoswipe/photoswipe.esm.min.js'),
  bgOpacity: 0.9,
  arrowPrevTitle: 'Forrige',
  arrowNextTitle: 'Næste',
  closeTitle: 'Luk',
  zoomTitle: 'Zoom',
  errorMsg: 'Billedet kunne ikke indlæses',
});

// Vis billedteksten (alt-teksten på miniaturen) under billedet
lightbox.on('uiRegister', () => {
  lightbox.pswp.ui.registerElement({
    name: 'billedtekst',
    order: 9,
    isButton: false,
    appendTo: 'root',
    onInit: (el, pswp) => {
      pswp.on('change', () => {
        const img = pswp.currSlide.data.element?.querySelector('img');
        el.textContent = img?.getAttribute('alt') || '';
      });
    },
  });
});

lightbox.init();
