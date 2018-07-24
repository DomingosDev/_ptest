<?php 
	$videos = glob("assets/videos/*.mp4");
	$video = $videos[rand(0, count($videos) -1 )];
?>
<div class="home" data-component="home">
    <div id="owl-carousel-home" class="owl-carousel owl-theme">
        <div class="item">
        		<div class="video">
		        	<video autoplay muted loop playsinline>
		        		<source src="<?php echo $video; ?>">
		        	</video>
	        	</div>
        </div>
    </div>
</div>


<div class="jobs" data-component="jobs">
	
	<ul class="jobs-lista">
		<li><a href="javascript:void(0)" data-item="1" title="PEPSICO" class="active">PEPSICO</a></li>
		<li><a href="javascript:void(0)" data-item="2" title="Lacta">Lacta</a></li>
		<li><a href="javascript:void(0)" data-item="3" title="Coca-cola">Coca-cola</a></li>
		<li><a href="javascript:void(0)" data-item="4" title="BRF">BRF</a></li>
		<li><a href="javascript:void(0)" data-item="5" title="Devassa">Devassa</a></li>
		<li><a href="javascript:void(0)" data-item="6" title="SKY">SKY</a></li>
		<li><a href="javascript:void(0)" data-item="7" title="TODDY">TODDY</a></li>
		<li><a href="javascript:void(0)" data-item="8" title="CIELO">CIELO</a></li>
		<li><a href="javascript:void(0)" data-item="9" title="MODERNA">MODERNA</a></li>
	</ul>

	<div class="jobs-items">
		<div data-id="1" class="jobs-item item active" style="background-image:url(assets/images/jobs/banner-pepsico.jpg)"></div>
		<div data-id="2" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-lacta.jpg)"></div>
		<div data-id="3" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-cocacola.jpg)"></div>
		<div data-id="4" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-brf1.jpg)"></div>
		<div data-id="5" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-devassa.jpg)"></div>
		<div data-id="6" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-sky.jpg)"></div>
		<div data-id="7" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-toddy1.jpg)"></div>
		<div data-id="8" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-cielo.jpg)"></div>
		<div data-id="9" class="jobs-item item" style="background-image:url(assets/images/jobs/banner-moderna.jpg)"></div>
	</div>
</div>

