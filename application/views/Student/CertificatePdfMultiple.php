<?php


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator("BCC ");
$pdf->SetAuthor('BCC Barishal');
$pdf->SetTitle('Cettificate Individuals');
$pdf->SetSubject('Cettificate');
$pdf->SetKeywords('BCC, PDF, Cettificate, Barishal, ICT');


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);



// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 13);




//For Multiple Student Certificate

foreach ($Students as $Info) {
     
            
        $pdf->AddPage('L', 'A4');
        
        
        // Display image on full page
        
        $img_file = $_SERVER['DOCUMENT_ROOT'].'dist/img/certificate2.JPG';
        
        
        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        //$img_file = K_PATH_IMAGES.'image_demo.jpg';
        $pdf->Image($img_file, 0, 0, 0, 0, 'jpg', '', '', true, 300, '', false, false, 0);
        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();
        
        
        
        // set cell padding
        $pdf->setCellPaddings(1, 1, 1, 1);
        
        // set cell margins
        $pdf->setCellMargins(10, 2, 10, 2);
        
        // set color for background
        $pdf->SetFillColor(255, 255, 255);
        
        
        $Name=<<<EOD
         <br><br><br><br><br><br><br><br><br><br><br><br> 
         <h1> $Info->Name </h1> 
        EOD;
        
        $body= <<<EOD
                
                
                 <p>Bearing Examination Registration No:<b>$Info->RegNO</b> 
                 is our student of $Info->Title Batch, $Info->Batch, Session: <b>$Info->CalenderYear</b>
              
               
                    
                <br><br>I wish every success in $smallGender2 life.
           
           
        EOD;
        
        
            
         //$pdf->writeHTMLCell(0, 0, '', '', $dateTime, 0, 1, 0, true, 'L',true);
        
        $pdf->writeHTMLCell(0, 0, '', '', $Name, 0, 1, 0, true, 'C',true);
        
        $pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, 'J',true);
        
        //$pdf->writeHTMLCell(0, 0, '', '', $signature, 0, 1, 0, true, 'L',true);     


}




// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
$pdf->Output('Certificate.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
