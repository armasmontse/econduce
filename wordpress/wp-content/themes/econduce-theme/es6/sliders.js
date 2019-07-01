
export const mapFiltersSlider = () => new Swiper('.map-slider_JS', {
    paginationClickable: true,
    direction: 'horizontal',
    loop: false,
    nextButton: '.map-slider__nav--next_JS',
    prevButton: '.map-slider__nav--prev_JS',
    //autoplay: 3000,
    slidesPerView: 8,
    spaceBetween: 2,
    breakpoints: {
        860: {
            slidesPerView: 6
        },

        600 : {
            slidesPerView: 4
        }
    }
});
