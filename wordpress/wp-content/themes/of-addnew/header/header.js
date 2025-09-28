window.addEventListener('load', (event) => {

	sliderOn();

	// スクロールで出現する
	scrollSlideIn();
});
/**
 * スクロールイベント
 */
window.addEventListener("scroll", function () {
	// スクロールで出現する
	scrollSlideIn();
});


function sliderOn(){
	
	jQuery('.slider').slick({
		/*
		autoplay: true,
		autoplaySpeed:5000,
		*/
		arrows: false,
		dots: false,
		infinite: true,
		slidesToShow: true,
		slidesToScroll: true,
		touchMove: true,

		slidesToShow: 1,
		centerMode: true,
		centerPadding: '0%',

		//autoplay: true, //オートプレイ
		autoplaySpeed: 5000, //オートプレイの切り替わり時間

		//レスポンシブでの動作を指定
		responsive: [{
			breakpoint: 1025,  //ブレイクポイントを指定
			settings: {
				centerPadding: '0',
			}
		}]
	});

}

/**
 * スクロールで画面に出現すると画面に表示するクラスを付与
 **/
let fadeInTarget = document.querySelectorAll('.slidein');
function scrollSlideIn() {
	for (let i = 0; i < fadeInTarget.length; i++) {
		const rect = fadeInTarget[i].getBoundingClientRect().top;
		const scroll = window.pageYOffset || document.documentElement.scrollTop;
		const offset = rect + scroll;
		const windowHeight = window.innerHeight; // 現在のブラウザの高さ
		if (scroll > offset - windowHeight + 150) {
			fadeInTarget[i].classList.add('js_active');
		}
	}
}
