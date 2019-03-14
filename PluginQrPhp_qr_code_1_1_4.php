<?php
class PluginQrPhp_qr_code_1_1_4{
  public function widget_png($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $text = null;
    if($data->get('data/text')){
      $text = urlencode($data->get('data/text'));
    }elseif($data->get('data/json')){
      $text = $data->get('data/json');
      $text = json_encode($text);
      $text = urlencode($text);
    }else{
      $text = urlencode('Missing data.');
    }
    $src = '/qr/png?text='.$text;
    $img = wfDocument::createHtmlElementAsObject('img');
    $img->set('attribute/src', $src);
    wfDocument::renderElement(array($img->get()));
  }
  public function page_png(){
    require_once __DIR__.'/lib/qrlib.php';
    $text = wfRequest::get('text');
    $text = urldecode($text);
    QRcode::png($text);
    exit;
  }
}
