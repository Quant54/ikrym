<?php 

// function add_style_and_script(){
// 	wp_enqueue_style('bootstrap-css','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
// 		wp_enqueue_style('bootstrap-css-theme','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
// 		wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

// }

// add_action( 'wp_enqueue_scripts','add_style_and_script');

function dwwp_sample_shortcode($atts, $content=null) {
$atts = shortcode_atts(
array(
'title'=>'Default title',
'src'=>'www.google.com',
),$atts
);
print_r($atts);
print_r($content);


	return "<h1>". $atts['title']."</h1>";


}
function prefix_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );


function prefix_filter_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style-filter', plugins_url('css/style-filter.css', __FILE__) );
    wp_enqueue_style( 'prefix-style-filter' );
     wp_enqueue_style('jquery-ui-css','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');

     //wp_enqueue_script( 'jquery-ui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1', true );
    wp_enqueue_script( 'filter-js',  plugins_url('js/filter.js', __FILE__),array('jquery','jquery-ui-slider'),'0.0.1',true);
}
add_action( 'wp_enqueue_scripts', 'prefix_filter_stylesheet' );
function dwwp_filter_houses() {

$city = $_GET['city'];
$ton = $_GET['ton'];
$too = $_GET['too'];
$status = $_GET['status'];
$balkon = $_GET['balkon'];
$hotwater = $_GET['hotwater'];
$center = $_GET['center'];
$condition = $_GET['condition'];
$seaview = $_GET['seaview'];
//$pfew = $_GET("pricefrom");
$fcities = get_terms('floor1');
$fton = get_terms('type_house');
$ftoo = get_terms('type_object');
//var_dump($fcities);
// foreach ($fcities as $fcity) {
// 	echo $fcity->name;
// }
$str='<form action="';
$str.=get_permalink(66);
$str.='" method="get">
			<div class="row">

				<div class="col-lg-4 ">
					<div class="form-group">
					
						<select class="form-control" id="fcity" name="city">
						<option value="0">Город</option>';
foreach ($fcities as $fcity) {
	 $str.='<option value="'.$fcity->slug.'" ';
   if ($fcity->slug ==$city)	$str.='selected';
	 $str.='>';
	 $str.=$fcity->name;
	 $str.='</option>';
}
				$str.='</select>
					</div>
				</div>
				<input type="hidden" name="filtered" value="1">
				<div class="col-lg-4">
					<div class="form-group">
						
						<select class="form-control" id="exampleFormControlSelect2" name="ton">
								<option value="0">Тип недвижимости</option>';
foreach ($fton as $ton_alone) {
	 $str.='<option value="'.$ton_alone->slug.'" ';
	 if ($ton_alone->slug ==$ton)	$str.='selected';
	 $str.='>';
	 $str.=$ton_alone->name;
	 $str.='</option>';
}
				$str.='</select>
					</div>
				</div>
				<div class="col-lg-4">
						<div class="form-group">
						
						<select class="form-control" id="exampleFormControlSelect3" name="too">
								<option value="0">Тип объекта</option>';
foreach ($ftoo as $too_alone) {
	 $str.='<option value="'.$too_alone->slug.'"';
	 if ($too_alone->slug ==$too)	$str.='selected';
	 $str.='>';
	 $str.=$too_alone->name;
	 $str.='</option>';
}
				$str.='</select>
					</div>
				</div>
			</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 ">
						<p>
							<label for="amount">Цена: </label><span id="amount" class="range"></span>
							<input type="hidden" id="pricefrom" name="pricefrom">
							<input type="hidden" id="priceto" name="priceto" >
						</p>
						<div id="slider-range"></div>
				</div>
				<div class="col-lg-4 col-md-4 ">
						<p>
							<label for="amount2">Площадь:</label><span id="amount2" class="range"></span>
							<input type="hidden" id="squrefrom" name="squrefrom" >
							<input type="hidden" id="squreto" name="squreto" >
						</p>
						<div id="slider-range2"></div>
				</div>
				<div class="col-lg-2 col-md-2">
					<div class="form-group center-block">
						<label for="exampleFormControlSelect4">Количество комнат</label>
						<select class="form-control" id="exampleFormControlSelect4" name="countroom">
							<option>-</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
					<div class="col-lg-3 col-md-3">
						<label for="amount3">Этаж:</label><span id="amount3" class="range"></span>
							<input type="hidden" id="floorfrom" name="floorfrom" >
							<input type="hidden" id="floorto" name="floorto" >
						</p>
						<div id="slider-range3"></div>
				</div>
			</div>
						<div class="row" id="checks">
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 ">
								<div class="[ form-group ]">
									<input type="checkbox" name="status" id="fancy-checkbox-success" autocomplete="off" ';
									if ($status=="on") $str.="checked";
									 $str.='/>
									<div class="[ btn-group ]">
										<label for="fancy-checkbox-success" class="[ btn btn-success ]">
											<span class="[ glyphicon glyphicon-ok ]"></span>
											<span> </span>
										</label>
										<label for="fancy-checkbox-success" class="[ btn btn-default active ]">
											Статус кватиры
										</label>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							 	<div class="[ form-group ]">
									<input type="checkbox" name="balkon" id="fancy-checkbox-success2" autocomplete="off" ';
									if ($balkon=="on") $str.="checked";
									 $str.='/>
									<div class="[ btn-group ]">
										<label for="fancy-checkbox-success2" class="[ btn btn-success ]">
											<span class="[ glyphicon glyphicon-ok ]"></span>
											<span> </span>
										</label>
										<label for="fancy-checkbox-success2" class="[ btn btn-default active ]">
										Балкон
										</label>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
								  	<div class="[ form-group ]">
									<input type="checkbox" name="hotwater" id="fancy-checkbox-success3" autocomplete="off"  ';
									if ($hotwater=="on") $str.="checked";
									 $str.='/>
									<div class="[ btn-group ]">
										<label for="fancy-checkbox-success3" class="[ btn btn-success ]">
											<span class="[ glyphicon glyphicon-ok ]"></span>
											<span> </span>
										</label>
										<label for="fancy-checkbox-success3" class="[ btn btn-default active ]">
										Горячая вода
										</label>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							
							    	<div class="[ form-group ]">
									<input type="checkbox" name="center" id="fancy-checkbox-success4" autocomplete="off"  ';
									if ($center=="on") $str.="checked";
									 $str.='/>
									<div class="[ btn-group ]">
										<label for="fancy-checkbox-success4" class="[ btn btn-success ]">
											<span class="[ glyphicon glyphicon-ok ]"></span>
											<span> </span>
										</label>
										<label for="fancy-checkbox-success4" class="[ btn btn-default active ]">
										Центр.отопление
										</label>
									</div>
								</div>
							</div>
						
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
						       	<div class="[ form-group ]">
									<input type="checkbox" name="condition" id="fancy-checkbox-success5" autocomplete="off" ';
									if ($condition=="on") $str.="checked";
									 $str.='/>
									<div class="[ btn-group ]">
										<label for="fancy-checkbox-success5" class="[ btn btn-success ]">
											<span class="[ glyphicon glyphicon-ok ]"></span>
											<span> </span>
										</label>
										<label for="fancy-checkbox-success5" class="[ btn btn-default active ]">
										Кондиционер
										</label>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							      	<div class="[ form-group ]">
									<input type="checkbox" name="seaview" id="fancy-checkbox-success6" autocomplete="off" ';
									if ($seaview=="on") $str.="checked";
									 $str.='/>
									<div class="[ btn-group ]">
										<label for="fancy-checkbox-success6" class="[ btn btn-success ]">
											<span class="[ glyphicon glyphicon-ok ]"></span>
											<span> </span>
										</label>
										<label for="fancy-checkbox-succes6" class="[ btn btn-default active ]">
										Вид на море
										</label>
									</div>
								</div>
							</div>
						

						</div>
						<div class="row">
							<div class="col-xs-12" id="submit">
								<button type="submit" class="btn btn-success btn-block"  >Поиск</button>
							</div>
						<!--	<div class="col-xs-3" id="submit">
								<button type="reset" class="btn btn-warning btn-block"  >Очистить</button>
							</div>
-->
						</div>
					</form>

';


return $str;
}

function dwwp_show_houses($atts, $content=null) {
$atts = shortcode_atts(
array(
'title'=>'Default title',
'src'=>'www.google.com',
),$atts
);
 $paged = get_query_var( 'paged', 1 );
$args = array( 
	'post_type' => 'house' ,
	'orderby'=>'menu_order',
	'order'=>'ASC',
	'no_found_rows'=>false,
	'update_post_term_cache'=>false,
	'posts_per_page' => 6,
	'paged'=>$paged,
);
$houses = new WP_Query( $args  );


$str='<div id="house-view" class="container">';
						$str='<div  class="row">';
								$str='<div  class="col-xs-12">';
							//	$str.='<h2>'.$atts['title'].'</h2>';
								$str.='</div>';



						 while ($houses->have_posts()):  	$houses->the_post();
						$str.='<div  class="col-lg-4" id="cell">';
						 	$str.='<a   href="'.get_permalink().'"><p>'.esc_html(get_the_title()).'</p>';
						 	$str.='<div class="imagesize">'.get_the_post_thumbnail( get_the_id(), array( 350, 350) ).'</div>';
						$str.='</a></div>';
						 	endwhile;


						 $str.='</div>';

wp_reset_postdata();
if($houses->max_num_pages > 1 && is_page()) {
			 $str.='<div  class="row">';
								$str.='<div  class="col-xs-12" id="pagination">';
								$str.='<nav class="prev-next-posts">';
									$str.='<div call="nav-next">';
									$str.=get_next_posts_link(__(' Следующая <span class="meta-nav">&rarr;</span>'), $houses->max_num_pages);
									$str.='</div>';

									$str.='<div call="nav-previous">';
									$str.=get_previous_posts_link(__('<span class="meta-nav">&larr;</span> Предыдущая '), $houses->max_num_pages);
									$str.='</div>';
									$str.='</nav>';
								$str.='</div>';
			 $str.='</div>';
}


				
 $str.='</div>';
return $str;



}



function house_listing_with_parameters($atts, $content=null) {
$city1 = $_GET['city'];
$ton1 = $_GET['ton'];
$too1 = $_GET['too'];
$countroom = $_GET['countroom'];
$pricefrom = $_GET['pricefrom'];
$priceto= $_GET['priceto'];
if (empty($pricefrom)) $pricefrom = 0;
if (empty($priceto)) $priceto= 9000000;
$squrefrom	 = $_GET['squrefrom'];
$squreto = $_GET['squreto'];
if (empty($squrefrom)) $squrefrom = 0;
if (empty($squreto)) $squreto= 9000;
$floorfrom = $_GET['floorfrom'];
$floorto = $_GET['floorto'];
if (empty($floorfrom)) $floorfrom = 0;
if (empty($floorto)) $floorto= 200;
$status = $_GET['status'];
$balkon = $_GET['balkon'];
$hotwater = $_GET['hotwater'];
$center = $_GET['center'];
$condition = $_GET['condition'];
$seaview = $_GET['seaview'];
$filtered = $_GET['filtered'];

$fcities = get_terms('floor1');
$fton = get_terms('type_house');
$ftoo = get_terms('type_object');

if (strlen($ton1)<2)  foreach ($fton as $fton_t)  $ton[] = $fton_t->slug; else $ton = $ton1;
if (strlen($too1)<2)  foreach ($ftoo as $ftoo_t)  $too[] = $ftoo_t->slug; else $too = $too1;

if (strlen($city1)<2)  foreach ($fcities as $fcity)  $city[] = $fcity->slug; else $city = $city1;

if ($filtered=='1'){
if ($status =='on') $foptions[]= "status";
if ($balkon =='on') $foptions[]= "balkon";
if ($hotwater =='on') $foptions[]= "goryachyavoda";
if ($center =='on') $foptions[]= "center";
if ($condition =='on') $foptions[]= "condition";
if ($seaview =='on') $foptions[]= "vidnamore";
}else 
{
$foptions = array(

);	
}

 $paged = get_query_var( 'paged', 1 );
 $args = array( 
	'post_type' => 'house' ,
	'orderby'=>'menu_order',
	'order'=>'ASC',
	'no_found_rows'=>false,
	'update_post_term_cache'=>false,
	'posts_per_page' => 6,
	'paged'=>$paged,

	'tax_query' => array(
	'relation' => 'AND',
		array(
			'taxonomy' => 'floor1',
			'field'    => 'slug',
			'terms'    => $city,
		),
			array(
			'taxonomy' => 'type_object',
			'field'    => 'slug',
			'terms'    => $too,
		),
		array(
			'taxonomy' => 'type_house',
			'field'    => 'slug',
			'terms'    => $ton,
		),
			array(
			'taxonomy' => 'floor',
			'field'    => 'slug',
operator => 'AND',
			'terms'    => $foptions,
		),
	),
	  'meta_query' => array(
	  	'relation' => 'AND',
		array(
			'key'     => 'house_price',
			'value'   => array( $pricefrom-1, $priceto+1 ),
			'type'    => 'NUMERIC',
			'compare' => 'BETWEEN',
		),
		array(
			'key'     => 'house_squre',
			'value'   => array( $squrefrom-1, $squreto+1 ),
			'type'    => 'NUMERIC',
			'compare' => 'BETWEEN',
		),
		array(
			'key'     => 'house_floor',
			'value'   => array( $floorfrom-1, $floorto+1 ),
			'type'    => 'NUMERIC',
			'compare' => 'BETWEEN',
		),
		),


);
$houses = new WP_Query( $args  );


$str='<div id="house-view" class="container">';
						$str='<div  class="row">';
								$str='<div  class="col-xs-12">';
							//	$str.='<h2>'.$atts['title'].'</h2>';
								$str.='</div>';



						 while ($houses->have_posts()):  	$houses->the_post();
						$str.='<div  class="col-lg-4" id="cell">';
						 	$str.='<a   href="'.get_permalink().'"><p>'.esc_html(get_the_title()).'</p>';
						 	$str.='<div class="imagesize">'.get_the_post_thumbnail( get_the_id(), array( 350, 350) ).'</div>';
						$str.='</a></div>';
						 	endwhile;


						 $str.='</div>';

wp_reset_postdata();
if($houses->max_num_pages > 1 && is_page()) {
			 $str.='<div  class="row">';
								$str.='<div  class="col-xs-12" id="pagination">';
								$str.='<nav class="prev-next-posts">';
									$str.='<div call="nav-next">';
									$str.=get_next_posts_link(__(' Следующая <span class="meta-nav">&rarr;</span>'), $houses->max_num_pages);
									$str.='</div>';

									$str.='<div call="nav-previous">';
									$str.=get_previous_posts_link(__('<span class="meta-nav">&larr;</span> Предыдущая '), $houses->max_num_pages);
									$str.='</div>';
									$str.='</nav>';
								$str.='</div>';
			 $str.='</div>';
}


				
 $str.='</div>';
return $str;
	}

add_shortcode('house_listing_with_parameters','house_listing_with_parameters');
add_shortcode('house_listing','dwwp_show_houses');
add_shortcode('house_filter','dwwp_filter_houses');