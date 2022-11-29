<?php
class PluginQrPhp_qr_code_1_1_4{
  public $src = null;
  public function widget_png($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $src = $this->getSrc($data->get('data/text'));
    $img = wfDocument::createHtmlElementAsObject('img');
    $img->set('attribute/src', $src);
    wfDocument::renderElement(array($img->get()));
  }
  public function page_png(){
    if(function_exists('ImageCreate')===false){
      throw new Exception('PluginQrPhp_qr_code_1_1_4 says: Method ImageCreate does not exist. Check if it´s enabled in php.ini.');
    }
    require_once __DIR__.'/lib/qrlib.php';
    $text = wfRequest::get('text');
    if(!$text){
      $text = 'Example text in PluginQrPhp_qr_code_1_1_4::page_png.';
    }
    $text = urldecode($text);
    QRcode::png($text);
    exit;
  }
  public function getSrc($text){
    if(!is_array($text)){
      $text = urlencode($text);
    }else{
      $text = json_encode($text);
      $text = urlencode($text);
    }
    $src = '/qr/png?text='.$text;
    return $src;
  }
  public function save_file($filename, $text){
    if(function_exists('ImageCreate')===false){
      throw new Exception('PluginQrPhp_qr_code_1_1_4 says: Method ImageCreate does not exist. Check if it´s enabled in php.ini.');
    }
    require_once __DIR__.'/lib/qrlib.php';
    if(is_array($text)){
      $text = json_encode($text);
    }
    QRcode::png($text, $filename);
    /**
     * src
     */
    $imageData = base64_encode(file_get_contents($filename));
    $this->src = 'data: '.mime_content_type($filename).';base64,'.$imageData;
  }
}
