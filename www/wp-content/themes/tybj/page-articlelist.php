<?php include('include.inc.php');  ?>
<?php
/**
 * Template Name: Article List
 *
 */

/** 如果你需要为该页面引入自定义的脚本的样式表，写在这里,不需要自定义样式就删除下面两行代码 */
//wp_enqueue_script( 'articleList', get_template_directory_uri() . '/articlelist.js' );
wp_enqueue_style( 'articleList', get_template_directory_uri() . '/articlelist.css');

// get_header(); 

/** 配置信息 */

/**
 * 排序字段
 * 可以是none, ID, author, title, date, modified, parent, rand, comment_count, menu_order, meta_value, meta_value_num
 */

$order_by = 'date'; 

/** 升序还是降序，DESC表示降序，ASC表示升序 */
$order = 'DESC';

/** 每页显示多少篇文章 */
$posts_per_page = 10;

/**
 * 只显示或不显示某些目录下的文章,目录ID用逗号分隔，排除目录前面加-
 * 例如排除目录29和30下的文章, $cat = '-29,-30';
 * 只显示目录29和30下的文章, $cat = '29, 30';
 */
$cat = '';

/** 是否只在第一页显示页面内容，false表示只在第一页显示页面内容 */
$show_content = true;
/* 配置结束 **/

/** 获取该页面的标题和内容 */
global $post;
$post_title = $post->post_title;
if( $show_content || $paged == 1  ) $post_content = apply_filters('the_content', $post->post_content);

/** 当前显示的是第几页 */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

/** 用WP_Query获取posts */
$post_list = new WP_Query(
	"posts_per_page=" . $posts_per_page .
	"&orderby=" . $order_by .
	"&order=" . $order .
	"&cat=" . $cat .
	"&paged=" . $paged
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>西樵天园饼家</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="assets/img/favicon.ico">
    <?php include('header_css.php');  ?>
    <link href="/<?=ty_of?>css/newlist.css" rel="stylesheet">
       <link href="/<?=ty_of?>css/articlelist.css" rel="stylesheet">
</head>

<body class="is-loaded is-scroll">
<?php
include dirname(__FILE__).'/header_list.php'; 
?>
             <!--newslist-->
         <div id="main" class="container mt10">
                <div class="row ">
                    <div class="col-md-9 pd0">
                        <ul class="newleft">
						<?php $query_index = 0;   while ( $post_list->have_posts() ) : $query_index++; $post_list->the_post(); ?>
							<?php  $category = get_the_category();//定义分类目录
							//判断是否是第一条
							if($query_index==1){?>
                            <li class="list first">
                            <?php }else{?>
                             <li class="list">
                               <?php }?>
                                <div class="mecc">
                                    <h2 class="mecctitle">
                                 <a href="<?php the_permalink() ?>" target="_blank">
                              <?php the_title(); ?> 
                                </a>
                                 </h2>
                                    <address class="meccaddress">
                                        <time><?php the_time('Y-n-j'); ?></time>
                                        -
                                        <a href="<?php echo get_category_link($category[0]->term_id ) ?>" rel="category tag"><?php 
echo $category[0]->cat_name;?></a>  阅 <?php get_post_views($post -> ID); ?> </address>
                                </div>
                                <span class="titleimg ">
        <a href="<?php the_permalink() ?>" target="_blank">
         <img class="lazy" src="/<?=ty_of?>images/loading.jpg"  
         <?php if($query_index==1){?>
        data-original="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=400&w=600&zc=1""  <?php }else{?>  data-original="<?php bloginfo('template_url');?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=200&w=300&zc=1""  <?php }?> alt="<?php the_title(); ?>" />   
        
         </a>
        </span>

                                <div class="zuiyao hidden-xs">
                                    <a href="<?php the_permalink() ?>">
                                      <?php the_excerpt() ?>
                                    </a>
                                </div>
                                <div class="clear"></div>
                            </li>
         		<?php endwhile; ?>
                        </ul> <!-- col-md-9 -->
            	<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi( array('query' => $post_list) );  ?>
            <div class="clear"></div>
                    </div>
                    <div class="col-md-3 column">
                  <?php
include dirname(__FILE__).'/sitebar.php'; 
?>

                    </div>
                </div>
            </div>
                <!--newslist-->



		<!-- 外部的html结构应该替换成自己模板的结构 -->
	

            <?php
include dirname(__FILE__).'/footer_t.php'; 
?>
    </body>
    </html>
    <?php
    include dirname(__FILE__).'/footer_js.php'; 
    ?>
    <script>    
          $(function() {
      $("img.lazy").show().lazyload({
      	  skip_invisible : false,
          effect: "fadeIn"
          });

  });

    </script>
  <script type="text/javascript">
    $(function() {
        var elm = $('.sitebar_list');
        var startPos = $(elm).offset().top;
        $.event.add(window, "scroll", function() {
            var p = $(window).scrollTop();
            $(elm).css('position', ((p) > startPos) ? 'fixed' : 'static');
            $(elm).css('top', ((p) > startPos) ? '0px' : '');
        });
    });
    </script>
