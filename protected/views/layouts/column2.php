<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="banner">
        <!-- Carousel Begin -->
        <div id="carousel" class="carousel slide carousel-fade">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="assets/img/slide1.jpg">

                    <div class="slider-con">
                        <div class="sli-con">
                            <h1>Xəbər 1</h1>

                            <p>Burda nese melumat olacaq</p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img src="assets/img/slide2.jpg">

                    <div class="slider-con">
                        <div class="sli-con">
                            <h1>Xəbər 2</h1>

                            <p>Burda nese melumat olacaq</p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img src="assets/img/slide3.jpg">

                    <div class="slider-con">
                        <div class="sli-con">
                            <h1>Xəbər 3</h1>

                            <p>Burda nese melumat olacaq</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#carousel" data-slide="prev"></a>
            <a class="carousel-control right" href="#carousel" data-slide="next"></a>
        </div>
        <!-- Carousel End -->
    </div>

    <div id="back-con">
        <div id="container">
            <div id="left-con">
                <ul>
                    <li>Bolmeler</li>
                    <li><a href="#">Menu Link 1</a></li>
                    <li><a href="#">Menu Link 2</a></li>
                    <li><a href="#">Menu Link 3</a></li>
                    <li><a href="#">Menu Link 4</a></li>
                    <li><a href="#">Menu Link 5</a></li>
                </ul>
            </div>
            <div id="right-con">
                <div class="margin">
                    <?= $content ?>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php $this->endContent(); ?>