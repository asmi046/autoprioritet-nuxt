
function init () {
  const myMap = new ymaps.Map('map_in_page', {
    center: [51.73477307225824, 36.17779749999995],
    zoom: 14,
    controls: ['zoomControl']
  })

  const myPlacemarkAdr = new ymaps.Placemark([51.73477307225824, 36.17779749999995], {
    iconContent: '',
    balloonContent: 'Наш адрес: ',
    hintContent: 'Наш адрес: '
  }, {
    iconLayout: 'default#image',
    iconImageHref: '/placeholder.svg',
    iconImageSize: [30, 54],
    iconImageOffset: [-15, -54]
  })

  myMap.geoObjects.add(myPlacemarkAdr)

  myMap.behaviors.disable('scrollZoom')
}

export default ({ app }, inject) => {
  inject('showmap', (msg) => {
    ymaps.ready(init)
  })
}
