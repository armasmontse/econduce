export const footerAnimation = () => {
    //Colores
    const gris = '#999', amarillo = '#FFCD00', rojo = '#FF0312', verde = '#00B443', vapor = '#00D9F3'

    //Timelines
    const [moto1T, moto2T, moto3T, semaforo1, semaforo2, nube1T, nube2T, nube3T, nube4T, nube5T, nube6T] = [/*motos*/1,2,3,/*semaforos*/ 1,2, /*nubes*/1,2,3,4,5,6].map(() => new TimelineMax({repeat: -1, repeatDelay:0}));

    //Nodos
    const [moto1, moto2, moto3] = [1,2,3].map(n => `.cycles-muneco${n}__container`)
    const [rojo1, ama1, verde1] = ['rojo','amarillo', 'verde'].map(c => `.cycles-semaforo1__container .semaforo-${c} circle`)
    const [rojo2, ama2, verde2] = ['rojo','amarillo', 'verde'].map(c => `.cycles-semaforo2__container .semaforo-${c} circle`)
    const [nube1, nube2, nube3, nube4, nube5, nube6] = [1,2,3,4,5,6].map(n => `#nube${n}`)

    //Factories
    const nubesAnimation = (timeline, nube) => {
        let duration = 80 + Math.random()*100//de 10segundos a 1minuto
        let w_width = jQuery(window).width()
        let initial_position = jQuery(nube).offset().left/w_width*100
        timeline
            .to(nube, duration*2/3, {x:2000, delay: Math.random()*10, ease: Power1.easeInOut})
            .to(nube, duration/3, {x:3000, fill:'transparent'})
            .to(nube, 0.1, {x:-500})
            .to(nube, 20, {fill:vapor, x:initial_position, ease: Power1.easeInOut})
    }


    //Animaciones

        //nubes
    [ [nube1T, nube1], 
      [nube2T, nube2], 
      [nube3T, nube3], 
      [nube4T, nube4], 
      [nube5T, nube5], 
      [nube6T, nube6]].forEach(([timeline, nube]) => nubesAnimation(timeline, nube))
    

        //Importante: Cada una dela siguientes dura 15 segundos
    moto1T
        .to(moto1, 5, {left:'68%', ease: Power3.easeOut})//avanza hasta el segundo semáforo
        .to(moto1, 3, {delay:3, left: '140%', ease: Power2.easeIn})//de detiene y luego avanza
        .to(moto1, 4, {})//fuera de la pantalla
    
    moto2T
        .to(moto2, 2.5, {delay: 4.5, left:'34%'})//avanza hasta el primer semáforo
        .to(moto2, 5.5, {delay:1.5, left: '140%', ease:Power3.easeIn})//se detiene y luego avanza hasta el final
        .to(moto2, 1, {})//fuera de la pantalla
    
    moto3T
        .to(moto3, 4.5, {delay:10.5, left: '130%', ease:Power1.easeIn})//le van a poner una multa
        .to(moto3, 0, {})
    
    // el semáforo1 está desfasado del semáforo2 por +0.5s, fuera de eso son iguales
    semaforo2
        .to(verde2,  0.1, {fill:gris ,delay:3, ease:Power2.easeIn})
        .to(ama2,   0.1, {fill: amarillo, ease:Power2.easeIn})
        .to(ama2,   0.1, {fill: gris, delay: 1.4})
        .to(rojo2,  0.1, {fill:rojo})
        .to(rojo2,  2.7, {})
        .to(rojo2,  0.1, {fill:gris})
        .to(verde2, 0.1, {fill:verde})
        .to(verde2, 7.3, {fill:verde})

    semaforo1
        .to(verde1,  0.1, {fill:gris ,delay:3.5, ease:Power2.easeIn})
        .to(ama1,   0.1, {fill: amarillo, ease:Power2.easeIn})
        .to(ama1,   0.1, {fill: gris, delay: 1.4})
        .to(rojo1,  0.1, {fill:rojo})
        .to(rojo1,  2.7, {})
        .to(rojo1,  0.1, {fill:gris})
        .to(verde1, 0.1, {fill:verde})
        .to(verde1, 6.8, {fill:verde})
}


