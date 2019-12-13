<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

// App::uses('CakePdf', 'CakePdf.Pdf');
App::uses('CakeEmail', 'Network/Email');

class LinksExtractionAPIController extends AppController
{
    public $components = array("Email", "RequestHandler");
    
    public function beforeFilter()
    {
        $this->Auth->allow('extractAllLinksFromUrl');
        $this->Auth->allow('htmltopdf');
        $this->Auth->allow('sendFile');
        $this->Auth->allow('sendPDFtoEmail');
    }

    public function extractAllLinksFromUrl()
    {
        // if(!$this->Auth->user()) {
        // if ($this->RequestHandler->isAjax()) {
        $this->autoRender = false;
        // if ($this->request->is('post')) {

        //get data from request object
        // $data = $this->request->input('json_decode', true);

        // if (empty($data)) {
        //     $data = $this->request->data;
        // }
        $url = $this->params['url']['url'];
        //    var_dump($url);
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $html = file_get_contents($url, false, stream_context_create($arrContextOptions));

        //Instantiate the DOMDocument class.
        $htmlDom = new DOMDocument;

        //Parse the HTML of the page using DOMDocument::loadHTML
        @$htmlDom->loadHTML($html);

        //Extract the links from the HTML.
        $links = $htmlDom->getElementsByTagName('a');

        //Array that will contain our extracted links.
        $extractedLinks = array();

        //Loop through the DOMNodeList.
        //We can do this because the DOMNodeList object is traversable.
        $printData = "";
        foreach ($links as $link) {


            //Get the link text.
            $linkText = $link->nodeValue;
            //Get the link in the href attribute.
            $linkHref = $link->getAttribute('href');

            //If the link is empty, skip it and don't
            //add it to our $extractedLinks array
            if (strlen(trim($linkHref)) == 0) {
                continue;
            }

            //Skip if it is a hashtag / anchor link.
            if ($linkHref[0] == '#') {
                continue;
            }

            $printData .= ($linkHref . "<br><br>");
            //Add the link to our $extractedLinks array.
            // $extractedLinks[] = array(
            //     'text' => $linkText,
            //     'href' => $linkHref
            // );
        }
   

        $name = $this->htmltopdf($printData);

        $this->sendPDFtoEmail();
        // // $this->response->body("123");
        $this->response->file("/webroot/$name", array(
            'download' => true,
            'name' => $url,
        ));
      
        $this->response->type('pdf');       
        
   

   

    }


    public function sendPDFtoEmail()
        {
            $this->autoRender = false;

            // var_dump( json_encode($this->request));
            // die();
            if ($this->request->is('post')) {
                if(!empty($this->request->form['File']['name'])){
                    $file = $this->request->form['File']['name'];   
                    $random_name = rand(1000,1000000)."-".$file;
          
                    $to = $this->request->data['Email'];   
                    $Email = new CakeEmail('gmail');
                    // $Email->sender('max.badran33@gmail.com', 'MyApp emailer');
                    $Email->from(array('max.badran33@gmail.com' => 'TaskManagment'));
                    $Email->to($to);
                    $Email->attachments(array($this->request->form['File']['name'] => $this->request->form['File']['tmp_name']));
                    $Email->subject('About');
                    $Email->send('My message with attachment');
                    return json_encode('success');
                }
            }
            return json_encode('not success');

    }

    public function htmltopdf($data)
    {
        App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
        $html = $data;
        $dompdf = new DOMPDF();
        $papersize = 'legal';
        $orientation = 'landscape';
        $dompdf->load_html(utf8_decode($html), Configure::read('App.encoding'));
        $dompdf->set_paper($papersize, $orientation);
        $dompdf->render();
        // echo $dompdf->output();
        $output = $dompdf->output();
        $str = rand();
        file_put_contents($str . '.pdf', $output);
        return $str . '.pdf';
    }



    
}
