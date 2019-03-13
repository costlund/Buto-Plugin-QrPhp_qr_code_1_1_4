<?php
class PluginQrPhp_qr_code_1_1_4{
  public function widget_png($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $text = $data->get('data/text');
    $text = urlencode($text);
    $img = wfDocument::createHtmlElementAsObject('img');
    $img->set('attribute/src', '/qr/png?text='.$text);
    wfDocument::renderElement(array($img->get()));
  }
  public function page_png(){
    require_once __DIR__.'/lib/qrlib.php';
    $text = wfRequest::get('text');
    QRcode::png($text);
    exit;
  }
}