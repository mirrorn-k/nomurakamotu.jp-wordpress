window.addEventListener('load', function(){
	
	var bar = new ProgressBar.Line(splash_text, {//id名を指定
		duration: 1200,//時間指定(1000＝1秒)
		text: {//テキストの形状を直接指定	
			style: {//天地中央に配置
				position:'absolute',
				left:'50%',
				top:'50%',
				padding:'0',
				margin:'0',
				transform:'translate(-50%,-50%)',
				'font-size':'1.2rem',
				color:'#fff',
			},
			autoStyleContainer: false //自動付与のスタイルを切る
		},

		strokeWidth: 0.2,//進捗ゲージの太さ
		color: '#555',//進捗ゲージのカラー
		trailWidth: 0.2,//ゲージベースの線の太さ
		trailColor: '#bbb',//ゲージベースの線のカラー

		step: function(state, bar) {
			bar.setText(Math.round(bar.value() * 100) + ' %'); //テキストの数値
		}
	});

	//アニメーションスタート
	bar.animate(1.0, function () {//バーを描画する割合を指定します 1.0 なら100%まで描画します
		jQuery("#loading").delay(500).fadeOut(800);//アニメーションが終わったら#splashエリアをフェードアウト
	});  
});
