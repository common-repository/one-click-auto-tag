<?php
/*
Plugin Name:One Click Auto Tag
Plugin URI: http://systemoffice.link/one-click-auto-tag/
Description: 過去の記事+タイトルとタグ一覧を比較してタグを自動的に追加します。
Version: 1.0.2
Author: MakotoAsao
Author URI: http://systemoffice.link
*/

?>
<?php
//外部から実行できないようにする
if ( ! defined( 'ABSPATH' ) ) exit;

//管理画面のメニューに項目を追加
function one_click_auto_tag_add_admin_menu(){
    add_menu_page('タグ自動生成','タグ自動生成設定', 'administrator', __FILE__, 'one_click_auto_tag_admin_page');
}
add_action('admin_menu', 'one_click_auto_tag_add_admin_menu');

//プラグインの設定画面を表示する関数
function one_click_auto_tag_admin_page() {
  ?>
  <div class="wrap">
    <h2>ワンクリック自動タグ入力</h2>
    <p>既存の全記事+タイトルとタグ一覧を比較して各記事にタグを自動的に追加します。
  <br><font color="red">※必ずバックアップを行ってから作業をして下さい。</font>
    </p>
  <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type="hidden" name="posted" value="start">
  <input type="submit" name="submit" class="submit_btn" value="実行">
  </form>
  </div>
  <?php
  if ($_POST['posted'] == 'start') {
    require_once( plugin_dir_path( __FILE__ ) . 'start.php' );
    }
}
?>
