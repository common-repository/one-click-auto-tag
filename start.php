<?php
// 外部から実行できないようにする
if ( ! defined( 'ABSPATH' ) ) exit;

//全記事取得
$my_posts = get_posts(array(
        'post_type' => any,
'numberposts' => -1,));

//全記事ループ
foreach($my_posts as $post){
 setup_postdata($post);
//変数設定
 $kiji_id=$post->ID;
 $titles=get_the_title($kiji_id);
 $content_data=strip_tags(get_the_content());
  $content_data=$titles.$content_data;
//タグ一覧取得
$tags = get_terms( array( 'taxonomy'=>'post_tag', 'get'=>'all' ));
// タグ判定ループ
foreach($tags as $value){
  // タグ有無判定
 if(strpos($content_data,$value->name) !== false){
   echo 'Title : '.$titles.'<br>';
   echo 'ID    : '.$kiji_id.'<br>';
   echo 'Tag   : '.$value->name.'<br>';
  // 判定　タグあり
  wp_set_object_terms( $kiji_id, $value->name, 'post_tag', true);
}
// 判定　タグ無し
}
}
wp_reset_postdata();
echo 'タグ自動入力完了（complete）';
 ?>
