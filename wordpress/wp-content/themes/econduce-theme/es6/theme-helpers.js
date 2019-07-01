const $ = jQuery
export const showAndPlayVideo = (video_container_selector, cover_image_selector) => {
    const video_container = $(video_container_selector)
    const cover_image = $(cover_image_selector)
    if(video_container.length === 0) {return}
    video_container.on('click', () => {
        const iframe = video_container.find('iframe').get(0)
        const video = iframe.src && window.Vimeo ? new window.Vimeo.Player(iframe) : null
        cover_image.fadeOut('slow')
        video.play()
    })
}

export const headerScroll = arrow_selector => {
    const arrow = $(arrow_selector)
    const w = $(window)
    arrow.click(() => {
        const scrollTop = w.width() > 786 ? w.height() - $('#header_JS').height() + 1 : w.height()
        $('html, body').animate({scrollTop})
    })
}

export const parseMoney = (num) => {
  num = parseFloat(num);
  return '$ ' + (num.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
}

//Menús del footer para que hagan toogle en responsive
export const toogleFooterMenus = function (selector) {
	//seleccionar en jQuery con $
	let label = $(selector);
	let ul = label.find('ul')
	//logica
		//no hay logica
	
	//handlers
	label.on('click', function () {
		if ($(window).width() >= 768) { return }
		let $this = $(this)
		let ul = $this.siblings('ul')
		if (ul.css('display') === 'none') {
			ul.slideDown();
		} else {
			ul.slideUp();
		}
	});
};
