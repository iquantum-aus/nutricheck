<?php
/*
Template Name: Executive Managment
*/
get_header(); ?>
		<div class="two columns"></div>
		<div id="primary" class="nine columns">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>
 <style>
            #exec_boxes {
                /*width:713px; */
		padding-bottom:50px;
            }
	    #exec_boxes .columns{padding-left:0}
	    #exec_boxes:after{clear: both}
            #exec_boxes a {
		width:100%;
                height:100px;
                background-color:#c3c5ca;
                display:block;
                text-decoration: none;
		margin-bottom:12px;
            }
            #exec_boxes a:hover {
                background-color:#041136;
            }
            #exec_boxes a:hover .exec_top {
                color: #40a9ea;
            }
            #exec_boxes a:hover .exec_bottom {
                color: #fff;
            }
            .exec_top {
                padding-left: 10px;
                padding-top:50px;
                color: #52545d;
                font-size:15px;
                font-weight:bold;
            }
            .exec_bottom {
                padding-left: 10px;
                text-transform:uppercase;
                color: #96989c;
                font-size:11px;
            }
            .exec_padding_top {
               
            }
            .exec_padding_right {
                
            }
        </style>
        <div id="exec_boxes">
	    <div class="four columns">
	    <a href="/en/executive-management/steven-betsalel.html">
		<div class="exec_top">Steven Betsalel</div>
		<div class="exec_bottom">Managing Director, Singapore</div>
	    </a>
	    </div>
		<div class="four columns">
	    <a href="/en/executive_management/scott_c_dorey.html">
		<div class="exec_top">Scott C. Dorey</div>
		<div class="exec_bottom">Chairman and Co-Chief Executive Officer</div>
	    </a>
	    </div>
	    <div class="four columns">
	    <a href="/en/executive_management/marc_wade.html">
		<div class="exec_top">Marc Wade</div>
		<div class="exec_bottom">Chairman and Co-Chief Executive Officer</div>
	    </a>
	    </div>
	    <div class="four columns">
            <a href="/en/executive_management/ted_price.html">
                <div class="exec_top">Ted Price</div>
                <div class="exec_bottom">Senior Advisor</div>
            </a>
	    </div>
	    <div class="four columns">
            <a href="/en/executive_management/stewart_j_paperin.html">
                <div class="exec_top">Stewart J. Paperin</div>
                <div class="exec_bottom">Managing Director</div>
            </a>
	    </div>
	    
		<!--
		<div class="four columns">
            <a href="/en/executive_management/carlos_ulloa.html">
                <div class="exec_top">Carlos Ulloa</div>
                <div class="exec_bottom">Managing Director</div>
            </a>
	    </div>
		-->
		
	    <div class="four columns">
            <a href="/en/executive_management/morgan_wilbur.html">
                <div class="exec_top ">Morgan J. Wilbur IV</div>
                <div class="exec_bottom">Head of Emerging Markets</div>
            </a>
	    </div>
	    <div class="four columns">
            <a href="/en/executive_management/gerald_charbonneau.html">
                <div class="exec_top">Gerald Charbonneau</div>
                <div class="exec_bottom">Managing Director Private Equity</div>
            </a>
	    </div>
	    
		<!--
		<div class="four columns">
            <a href="/en/executive_management/yagiz_sozmen.html">
                <div class="exec_top">Yagiz Sozmen</div>
                <div class="exec_bottom">Managing Director Turkey</div>
            </a>		
	    </div>
		-->
		
	    <div class="four columns">
            <a href="/en/executive-management/michael-yin-kong-cheng.html">
                <div class="exec_top">Michael Yin Kong Cheng</div>
                <div class="exec_bottom">Managing Director</div>
            </a>		
	    </div>
	    <div class="four columns">
            <a href="/en/executive-management/john-hall.html">
                <div class="exec_top">John Hall</div>
                <div class="exec_bottom">Managing Director</div>
            </a>		
	    </div>
	    <div class="four columns">
            <a href="/en/executive-management/robert-dolan.html">
                <div class="exec_top">Robert Dolan</div>
                <div class="exec_bottom">Senior Managing Director</div>
            </a>		
	    </div>
	    <div class="four columns">
            <a href="/en/executive-management/man-chi-hung-davy.html">
                <div class="exec_top">Man Chi Hung Davy</div>
                <div class="exec_bottom">Managing Director Greater China</div>
            </a>		
	    </div>
	    <hr />
        </div>
				<?php endwhile; // end of the loop. ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->
		<div class="one columns"></div>
		<br><br>
<?php get_footer(); ?>