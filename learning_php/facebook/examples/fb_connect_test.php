<?php

require '../src/facebook.php';
define('APP_ID', '358056314299074');
define('SECRET_KEY', 'f2719eb5aea9e9730052963da1e12666');
define('LOCALE_JA', 'ja_JP');

$facebook = new Facebook(array(
  'appId'  => APP_ID,
  'secret' => SECRET_KEY
));

$user = $facebook->getUser();

if ($user) {
  try {
    $parameter = array('fields'=>'id,name,first_name,last_name,birthday,location,gender,email','locale'=>LOCALE_JA);
    $user_profile = $facebook->api('/me', 'GET', $parameter);
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('scope'=>'user_birthday,email'));
}

$user_profile['birthday'] = explode('/', $user_profile['birthday']);

$arrGender = array('男性'=>'1','女性'=>'2','male'=>'1','female'=>'2');
$checked = array('male'=>null, 'female'=>null);
if ($arrGender[$user_profile['gender']] == 1) {
  $checked['male'] = 'checked';
} else if ($arrGender[$user_profile['gender']] == 2) {
  $checked['female'] = 'checked';
}

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
  <head><title>php-sdk</title></head>
  <body>
    <h1>Facebook API テスト</h1>
    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <?php if ($user): ?>
      <!--<h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>-->
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
    <br>
    <table>
      <tr><td>メールアドレス：&nbsp;<?php print_r($user_profile['email']);?></td></tr>
      <tr><td>パスワード：&nbsp;<input type="password" name="passwd" value=""></td></tr>
      <tr><td>パスワード（確認）：&nbsp;<input type="password" name="passwd_cnf" value=""></td></tr>
      <tr><td>氏名：&nbsp;
        姓<input type="text" value="<?php print_r($user_profile['last_name']);?>">&nbsp;
        名<input type="text" value="<?php print_r($user_profile['first_name']);?>">
      </td></tr>
      <tr><td>フリガナ：&nbsp;
        セイ<input type="text" value="">&nbsp;
        メイ<input type="text" value="">
      </td></tr>
      <tr>
        <td>性別：&nbsp;
          男性&nbsp;<input type="radio" name="sex" value="1" <?php print_r($checked['male'])?>>&nbsp;
          女性&nbsp;<input type="radio" name="sex" value="2" <?php print_r($checked['female'])?>>
        </td>
      </tr>
      <tr><td>生年月日：&nbsp;
        <input type="text" name="birth_yyyy" value="<?php print_r($user_profile['birthday'][2]);?>" size="4" maxlength="4">年&nbsp;
        <input type="text" name="birth_mm" value="<?php print_r($user_profile['birthday'][0]);?>" size="2" maxlength="2">月&nbsp;
        <input type="text" name="birth_dd" value="<?php print_r($user_profile['birthday'][1]);?>" size="2" maxlength="2">日
      </td></tr>
    </table>
  </body>
</html>
