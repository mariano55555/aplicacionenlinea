<?php
/*debug($estudios);
debug($actividades);
debug($telefonos);
debug($html);
echo "<pre>";
print_r($data);
echo "</pre>";*/
App::import('Vendor','tcpdf/tcpdf');
// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

class MYPDF extends TCPDF {
#$pdf->Image('images/logoesen.jpg', 90, 8, 0, 0, 'JPG', 'http://www.esen.edu.sv', '', true, 250, '', false, false, 1, false, false, false);
    //Page header
    public function Header() {
        // si la pagina es diferente de la 2
     //   if (count($this->pages) !== 2) 
       // {
            // Logo
            $image_file = K_PATH_IMAGES.'logoesen.jpg';
            $this->Image($image_file, 90, 5, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'B', 20);
            // Title
            //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
      //  }
    }

    // Page footer
    public function Footer() {
        /*if (count($this->pages) !== 2)
        {*/
            // Position at 15 mm from bottom
            $this->SetY(-18);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, '- Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().' -', 0, false, 'C', 0, '', 0, false, 'T', 'M');
            $this->SetY(-14);
            $this->Cell(0, 10, 'Km. 12 1/2 Carrereta al Puerto de La Libertad, calle nueva a Comasagua, Santa Tecla, La Libertad, El Salvador, C.A. ', 0, false, 'C', 0, '', 0, false, 'T', 'M');
            $this->SetY(-10);
            $this->Cell(0, 10, 'Oficina de Admisión: (503)2234-9275 2234-9278, PBX:(503)2234-9292 email:admision@esen.edu.sv www.esen.edu.sv ', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        /*}*/
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mariano Paz');
$pdf->SetTitle('Formulario');
$pdf->SetSubject('Formulario');
$pdf->SetKeywords('Aplicación en línea, Esen, Escuela Superior de Economía y Negocios');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 12, '', true);

$pdf->AddPage();


$pdf->writeHTML($html, true, false, true, false, '');


// la segunda pagina debe de ser en blanco

//$pdf->AddPage();


// pagina 2

$pdf->AddPage();

$pdf->SetFillColor(255, 255, 215);
$pdf->SetFont('helvetica', '', 8);


$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => 0, 'color' => array(0, 0, 0));
$pdf->Text(147, 20, 'Pegar foto reciente');
$pdf->Rect(145, 5, 30, 40, 'D', array('all' => $style3));

/*
$html = '
<h2 style="text-align:center">Solicitud de admisi&oacute;n</h1>
<h3 style="color:red; text-align:center">N°  $codigoPostulante</h3>
';
$pdf->writeHTML($html, true, false, true, false, '');*/

$pdf->SetFont('times', '', 12, '', true);

$pdf->writeHTML($html2, true, false, true, false, '');

$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);


$check = explode(" ",$data[0]['users']['name']);

switch (count($check)) {
	case 2:
	$nombre   = $check[0];
	$apellido = $check[1];
		break;
	
	default:
	if (isset($check[0])) {
		$nm1 = $check[0];
	}else{
		$nm1 = ' ';
	}
	if (isset($check[1])) {
		$nm2 = $check[1];
	}else{
		$nm2 = ' ';
	}
	if (isset($check[2])) {
		$ap1 = $check[2];
	}else{
		$ap1 = ' ';
	}
	if (isset($check[3])) {
		$ap2 = $check[3];
	}else{
		$ap2 = ' ';
	}
	$apellido = $ap1.' '.$ap2;
	$nombre   = $nm1.' '.$nm2;
		break;
}

$apellidos = explode(" ",$data[0]['users']['name']);
if (isset($apellidos[2])) {
	$ap1 = $apellidos[2];
}else{
	$ap1 = 'mariano';
}
if (isset($apellidos[3])) {
	$ap2 = $apellidos[3];
}else{
	$ap2 = ' ';
}
$apellido  = $ap1.' '.$ap2;



$pdf->MultiCell(120, 4, $apellido, 1, 'L', 1, 0);

$pdf->Ln();

$html = "<div>Nombres</div>";
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(120, 4, $nombre, 1, 'L', 1, 0);

$pdf->Ln();

$originalDate = $data[0]['users']['nacimiento'] ;
$newDate      = date("d-m-Y", strtotime($originalDate));

switch ($data[0]['users']['genero']) {
    case 'M':
        $html3 = '
        <table cellspacing="3" cellpadding="4" width:100%>
            <tr>
                <td style="width:10%">Sexo</td>
                <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:4%">M</td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:4%">F</td>
                <td style="width:24%">Fecha de nacimiento</td>
                <td style="width:18%">'.$newDate.'</td>
            </tr>
        </table>
        ';
        break;
    
    default:
        $html3 ='
        <table cellspacing="3" cellpadding="4" width:100%>
            <tr>
                <td style="width:10%">Sexo</td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:4%">M</td>
                <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:4%">F</td>
                <td style="width:24%">Fecha de nacimiento</td>
                <td style="width:18%">'.$newDate.'</td>
            </tr>
        </table>
        ';
        break;
}
// output the HTML content
$pdf->writeHTML($html3, true, false, true, false, '');


$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(30, 4, 'Nacionalidad', 1, 'L', 1, 0);


$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(120, 4, $data[0]['paises']['name'] , 1, 'L', 1, 0);

$pdf->Ln();

$html = <<<EOD
<br/>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;D&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;NOMBRE DE LA INSTITUCION EDUCATIVA DE PROCEDENCIA</span>
</div>
EOD;

if (isset($data[0]['instituciones']['name']) && !empty($data[0]['instituciones']['name'])) 
{
	$institucion_nombre = $data[0]['instituciones']['name'];
}elseif(isset($data[0]['instituciones_adicionales']['name']) && !empty($data[0]['instituciones_adicionales']['name']))
{
	$institucion_nombre = $data[0]['instituciones_adicionales']['name'];
}else{
	$institucion_nombre = ' ';
}


// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(80, 4, $institucion_nombre, 1, 'L', 1, 0);
#$pdf->Ln();
$html3 = '
        <table cellspacing="0" cellpadding="0" width:100%>
            <tr>
                <td style="width:34%"></td>
                <td style="width:8%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:24%">Privada</td>
                <td style="width:8%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:24%">P&uacute;blica</td>
            </tr>
        </table>
        ';

$pdf->writeHTML($html3, true, false, true, false, '');


$pdf->writeHTML($html3, true, false, true, false, '');

switch ($data[0]['aplicaciones']['examen_id']) {
    case 1:
        $html3 = '
        <table cellspacing="0" cellpadding="0" width:100%>
            <tr>
                <td style="width:18%; vertical-align:center;">Tipo de examen</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">PAA</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">IB</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">SAT</td>
            </tr>
        </table>
        ';
        break;

    case 2:
         $html3 = '
        <table cellspacing="0" cellpadding="0" width:100%>
            <tr>
                <td style="width:18%; vertical-align:center;">Tipo de examen</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">PAA</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">IB</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">SAT</td>
            </tr>
        </table>
        ';
        break;
    
    default:
        $html3 = '
        <table cellspacing="0" cellpadding="0" width:100%>
            <tr>
                <td style="width:18%; vertical-align:center;">Tipo de examen</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">PAA</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">IB</td>
                <td style="width:4%; vertical-align:center;"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">SAT</td>
            </tr>
        </table>
        ';
        break;
}


$pdf->writeHTML($html3, true, false, true, false, '');
$pdf->Write(0, 'Si se encuentra dentro de un programa especial de estudios, por favor indique la sede.', '', 0, 'L', true, 0, false, false, 0);



switch ($data[0]['superates']['id']) {
    case 2:
        $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">ADOC</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_check.png" width="20px" height="20px"></td>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_unchecked.png" width="20px" height="20px"></td>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_unchecked.png" width="20px" height="20px"></td>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_unchecked.png" width="20px" height="20px"></td>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_unchecked.png" width="20px" height="20px"></td>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_unchecked.png" width="20px" height="20px"></td>
                <td style="width:10%; vertical-align:center;" style="font-size:0.8em">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;" style="font-size:0.8em"><img src="images/checkbox_unchecked.png" width="20px" height="20px"></td>
            </tr>
        </table>
        ';
        break;
    
    case 3:
        $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_check.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
            </tr>
        </table>
        ';
        break;

    case 5:
        $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_check.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
            </tr>
        </table>
        ';
        break;

    case 6:
        $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_check.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
            </tr>
        </table>
        ';
        break;

    case 9:
         $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_check.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
            </tr>
        </table>
        ';
        break;

     case 10:
         $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_check.png" width="32px" height="32px"></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><img src="images/checkbox_unchecked.png" width="32px" height="32px"></td>
            </tr>
        </table>
        ';
        break;

    case 11:
         $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><<!--img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
            </tr>
        </table>
        ';
        break;

    default:
       $html3 = '
        <br/>
        <table cellspacing="0" cellpadding="0" style="width:100%">
            <tr>
                <td style="width:10%; vertical-align:center;">ADOC</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">CASSA (San Miguel)</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">F. Jupa (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">F. Alberto Motta (Panamá)</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">HILASAL</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">I. MERLET</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:center;">Gloria de Kriete</td>
                <td style="width:4.28%; vertical-align:center;"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
            </tr>
        </table>
        ';
        break;
}

$pdf->writeHTML($html3, true, false, true, false, '');

$html = <<<EOD
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;E&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;¿TIENE ALGÚN HERMANO ESTUDIANTE O GRADUADO DE LA ESEN?</span>
</div>
EOD;

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$pdf->setCellMargins(1, 1, 1, 1);
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(20, 4, 'Nombre', 1, 'L', 1, 0);


$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(95, 4, $data[0]['hermanos']['name'], 1, 'L', 1, 0);


$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(20, 4, 'Año', 1, 'R', 1, 0);


$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(20, 4, $data[0]['hermanos']['year'] , 1, 'R', 1, 0);


// set cell margins
$pdf->Ln();
$pdf->Ln();
// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);
$html3 = '
        <table cellspacing="0" cellpadding="0" width:100% border="1">
            <tr>
                <td colspan="6" style="text-align:center"> USO EXCLUSIVO DE LA ESEN</td>
            </tr>
            <tr>
                <td style="text-align:center">Fecha de recepción</td>
                <td></td>
                <td style="text-align:center">Ingresó datos</td>
                <td></td>
                <td style="text-align:center">Mantenimiento</td>
                <td></td>
            </tr>
            <tr>
                <td>Tipo de examen</td>
                <td colspan="2" style="text-align:center">Verbal</td>
                <td colspan="2" style="text-align:center">Matermáticas</td>
                <td style="text-align:center">Total</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="6" height="18px"></td>
            </tr>
        </table>
        ';
$pdf->writeHTML($html3, true, false, true, false, '');

// tercera pagina

$pdf->AddPage();


$html = '
<br/>
<h2 style="text-align:center">Solicitud de admisi&oacute;n</h1>
<h3 style="color:red; text-align:center">N° '.$data[0]['aplicaciones']['codigoPostulante'] .'</h3>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;F&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;DATOS DE CONTACTO</span>
</div>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$html = '
<table width="100%" cellpadding="1">
    <tr>
        <td>Dirección (donde recibe correspondencia)</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;">'.$data[0]['users']['direccion'].'</td>
    </tr>
</table>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


if (!empty($data[0]['municipios']['id']) && !empty($data[0]['municipios']['id']) && !empty($data[0]['paisdepto']['id'])) {
	$html = '
	<table width="100%" cellpadding="1">
	    <tr>
	        <td style="width:45%">Municipio</td>
	        <td style="width:5%"></td>
	        <td style="width:22.5%">Departamento</td>
	        <td style="width:5%"></td>
	        <td style="width:22.5%">País</td>
	    </tr>
	    <tr>
	        <td style="border-width:1px 1px 1px 1px;width:45%">'.$data[0]['municipios']['name'].'</td>
	        <td style="5%"></td>
	        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$data[0]['departamentos']['name'].'</td>
	        <td style="5%"></td>
	        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$data[0]['paisdepto']['name'].'</td>
	    </tr>
	</table>
	';
}elseif (!empty($data[0]['paisotraubicacion']['id']) && !empty($data[0]['otraubicaciones']['name']) && !empty($data[0]['otraubicaciones']['pais_id'])) {
	$html = '
	<table width="100%" cellpadding="1">
	    <tr>
	        <td style="width:45%">Ciudad</td>
	        <td style="width:15%"></td>
	        <td style="width:40%">País</td>
	    </tr>
	    <tr>
	        <td style="border-width:1px 1px 1px 1px;width:45%">'.$data[0]['otraubicaciones']['name'].'</td>
	        <td style="15%"></td>
	        <td style="border-width:1px 1px 1px 1px;width:40%">'.$data[0]['paisotraubicacion']['name'].'</td>
	    </tr>
	</table>
	';
}else{
	$html = '
	<table width="100%" cellpadding="1">
	    <tr>
	        <td style="width:45%">Municipio</td>
	        <td style="width:5%"></td>
	        <td style="width:22.5%">Departamento</td>
	        <td style="width:5%"></td>
	        <td style="width:22.5%">País</td>
	    </tr>
	    <tr>
	        <td style="border-width:1px 1px 1px 1px;width:45%"></td>
	        <td style="5%"></td>
	        <td style="border-width:1px 1px 1px 1px;width:22.5%"></td>
	        <td style="5%"></td>
	        <td style="border-width:1px 1px 1px 1px;width:22.5%"></td>
	    </tr>
	</table>
	';
}




$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

foreach ($telefonos as $key => $value) {
 if ($value['tipo'] == 1) {
 	$tel = $value['name'];
 }elseif ($value['tipo'] == 2) {
 	$cel = $value['name'];
 }
}

$tel = isset($tel) ? $tel : ' ';
$cel = isset($cel) ? $cel : ' ';

$html = '
<table width="100%" cellpadding="1">
    <tr>
        <td style="width:22.5%">Teléfono</td>
        <td style="width:5%"></td>
        <td style="width:22.5%">Celular</td>
        <td style="width:5%"></td>
        <td style="width:45%">Correo electrónico</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$tel.'</td>
        <td style="5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$cel.'</td>
        <td style="5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:45%">'.$data[0]['users']['email'].'</td>
    </tr>
</table>
';

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$html = <<<EOD
<br/>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;G&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;DATOS FAMILIARES</span>
</div>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);



$madre['name']      = isset($madre['name']) ? $madre['name'] :'';
$madre['ocupacion'] = isset($madre['ocupacion']) ? $madre['ocupacion'] :'';
$madre['trabajo']   = isset($madre['trabajo']) ? $madre['trabajo'] :'';
$madre['telefono']  = isset($madre['telefono']) ? $madre['telefono'] :'';
$madre['celular']   = isset($madre['celular']) ? $madre['celular'] :'';
$madre['email']     = isset($madre['email']) ? $madre['email'] :'';

$padre['name']      = isset($padre['name']) ? $padre['name'] :'';
$padre['ocupacion'] = isset($padre['ocupacion']) ? $padre['ocupacion'] :'';
$padre['trabajo']   = isset($padre['trabajo']) ? $padre['trabajo'] :'';
$padre['telefono']  = isset($padre['telefono']) ? $padre['telefono'] :'';
$padre['celular']   = isset($padre['celular']) ? $padre['celular'] :'';
$padre['email']     = isset($padre['email']) ? $padre['email'] :'';


$html = '
<table width="100%" cellpadding="1">
    <tr>
        <td style="width:47.5%">Nombre completo del padre</td>
        <td style="width:5%"></td>
        <td style="width:47.5%">Nombre completo de la madre</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$padre['name'].'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$madre['name'].'</td>
    </tr>
    <tr>
        <td style="width:47.5%">Ocupación</td>
        <td style="width:5%"></td>
        <td style="width:47.5%">Ocupación</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$padre['ocupacion'].'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$madre['ocupacion'].'</td>
    </tr>
    <tr>
        <td style="width:47.5%">Lugar de trabajo</td>
        <td style="width:5%"></td>
        <td style="width:47.5%">Lugar de trabajo</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$padre['trabajo'].'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$madre['trabajo'].'</td>
    </tr>
    <tr>
        <td style="width:22.5%">Teléfono</td>
        <td style="width:2.5%"></td>
        <td style="width:22.5%">Celular</td>
        <td style="width:5%"></td>
        <td style="width:22.5%">Teléfono</td>
        <td style="width:2.5%"></td>
        <td style="width:22.5%">Celular</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$padre['telefono'].'</td>
        <td style="width:2.5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$madre['celular'].'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$padre['telefono'].'</td>
        <td style="width:2.5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:22.5%">'.$madre['celular'].'</td>
    </tr>
    <tr>
        <td style="width:47.5%">Correo electrónico</td>
        <td style="width:5%"></td>
        <td style="width:47.5%">Correo electrónico</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$padre['email'] .'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$madre['email'] .'</td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>
';

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

switch ($responsablemio) {
	case 'papa':
	$html='<table>
		 	<tr>
		        <td style="width:47.5%">Marcar quién de sus padres queda como responsable</td>
		        <td style="width:5%"></td>
		        <td style="width:7.5%">Padre</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_check.png" width="20px" height="20px">--></td>
		        <td style="width:7.5%">Madre</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_unchecked.png" width="20px" height="20px">--></td>
		        <td style="width:7.5%">Ambos</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_unchecked.png" width="20px" height="20px">--></td>
	    	</tr>
	    </table>';
		break;
	case 'mama':
	$html='<table>
		 	<tr>
		        <td style="width:47.5%">Marcar quién de sus padres queda como responsable</td>
		        <td style="width:5%"></td>
		        <td style="width:7.5%">Padre</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_check.png" width="20px" height="20px">--></td>
		        <td style="width:7.5%">Madre</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_unchecked.png" width="20px" height="20px">--></td>
		        <td style="width:7.5%">Ambos</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_unchecked.png" width="20px" height="20px">--></td>
	    	</tr>
	    </table>';
		break;
	default:
	$html='<table>
		 	<tr>
		        <td style="width:47.5%">Marcar quién de sus padres queda como responsable</td>
		        <td style="width:5%"></td>
		        <td style="width:7.5%">Padre</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_check.png" width="20px" height="20px">--></td>
		        <td style="width:7.5%">Madre</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_unchecked.png" width="20px" height="20px">--></td>
		        <td style="width:7.5%">Ambos</td>
		        <td style="width:7.5%"><!--<img src="images/checkbox_unchecked.png" width="20px" height="20px">--></td>
	    	</tr>
	    </table>';
		break;
}

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$responsable['name']       = isset($responsable['name']) ? $responsable['name'] :'';
$responsable['parentesco'] = isset($responsable['parentesco']) ? $responsable['parentesco'] :'';
$responsable['ocupacion']  = isset($responsable['ocupacion']) ? $responsable['ocupacion'] :'';
$responsable['trabajo']    = isset($responsable['trabajo']) ? $responsable['trabajo'] :'';
$responsable['telefono']   = isset($responsable['telefono']) ? $responsable['telefono'] :'';
$responsable['celular']    = isset($responsable['celular']) ? $responsable['celular'] :'';
$responsable['email']      = isset($responsable['email']) ? $responsable['email'] :'';

$html = '
<br/>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;H&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;PERSONA RESPONSABLE (SOLAMENTE SI NO ES UNO DE LOS PADRES)</span>
</div>
<br/>
<table width="100%" cellpadding="1">
    <tr>
        <td style="width:47.5%">Nombre completo</td>
        <td style="width:5%"></td>
        <td style="width:47.5%">Parentesco</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$responsable['name'].'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$responsable['parentesco'].'</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td style="width:47.5%">Ocupación</td>
        <td style="width:5%"></td>
        <td style="width:47.5%">Lugar de trabajo</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$responsable['ocupacion'].'</td>
        <td style="width:5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:47.5%">'.$responsable['trabajo'].'</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td style="width:30%">Teléfono</td>
        <td style="width:2.5%"></td>
        <td style="width:30%">Celular</td>
        <td style="width:2.5%"></td>
        <td style="width:34.98%">Correo electrónico</td>
    </tr>
    <tr>
        <td style="border-width:1px 1px 1px 1px;width:30%">'.$responsable['telefono'].'</td>
        <td style="width:2.5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:30%">'.$responsable['celular'].'</td>
        <td style="width:2.5%"></td>
        <td style="border-width:1px 1px 1px 1px;width:34.98%">'.$responsable['email'].'</td>
    </tr>
</table>
';
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$pdf->AddPage();
$html = '
<br/>
<h2 style="text-align:center">Solicitud de admisi&oacute;n</h1>
<h3 style="color:red; text-align:center">N° '. $data[0]['aplicaciones']['codigoPostulante'].'</h3>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;I&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;EVALUACIÓN PERSONAL</span>
</div>
<br/>
<span>Comparándose con otros compa&ntilde;eros personalmente me eval&uacute;o as&iacute;</span>
<br/>
';

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


switch ($data[0]['aplicaciones']['evaluacion_id']) 
{
    case 1:
        $html =<<<EOD
<table cellpadding=1 cellspacing=1>
    <tr>
        <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
        <td style="width:15%">Debajo del promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:10%">Promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Bueno (arriba del promedio)</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Mejor 10%</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:20%">Uno de los mejores de la clase</td>

    </tr>
</table>
EOD;
        break;

    case 2:

$html =<<<EOD
<table cellpadding=1 cellspacing=1>
    <tr>
        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Debajo del promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
        <td style="width:10%">Promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Bueno (arriba del promedio)</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Mejor 10%</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:20%">Uno de los mejores de la clase</td>

    </tr>
</table>
EOD;

        break;

    case 3:

$html =<<<EOD
<table cellpadding=1 cellspacing=1>
    <tr>
        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Debajo del promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:10%">Promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Bueno (arriba del promedio)</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Mejor 10%</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
        <td style="width:20%">Uno de los mejores de la clase</td>

    </tr>
</table>
EOD;

        break;

    case 4:

$html =<<<EOD
<table cellpadding=1 cellspacing=1>
    <tr>
        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Debajo del promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:10%">Promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
        <td style="width:15%">Bueno (arriba del promedio)</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Mejor 10%</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:20%">Uno de los mejores de la clase</td>

    </tr>
</table>
EOD;

        break;
    
    default:

$html =<<<EOD
<table cellpadding=1 cellspacing=1>
    <tr>
        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Debajo del promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:10%">Promedio</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:15%">Bueno (arriba del promedio)</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px"></td-->>
        <td style="width:15%">Mejor 10%</td>

        <td style="width:2%"></td>

        <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
        <td style="width:20%">Uno de los mejores de la clase</td>

    </tr>
</table>
EOD;

        break;
}

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$html = '
<br/>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;J&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;DATOS ACADEMICOS</span>
</div>
<br/>
<span>ESTUDIOS</span>
<br/>
Mencione las instruccies académicas donde ha estudiado desde sexto grado hasta la fecha (incluyendo estudios universitarios)
Si cuenta con estudios universitarios deberá incluir las notas de los años cursados.
<br/><br/>
<table border = "1" cellpadding=1 cellspacing=1>
    <tr>
       <td style="width:60%; text-align: center; color:#ffffff; background-color:#000000">INSTITUCIÓN</td>
       <td style="width:20%; text-align: center; color:#ffffff; background-color:#000000">GRADO</td>
       <td style="width:20%; text-align: center; color:#ffffff; background-color:#000000">PERÍODO</td>
    </tr>';

   foreach ($estudios as $key => $value) {
    $html .='<tr>
                <td style="width:60%; text-align:left; font-size:0.8em">'.$value['institucion'] .'</td>
                <td style="width:20%; text-align:center; font-size:0.8em">'.$value['name'] .'</td>
                <td style="width:20%; text-align:center; font-size:0.8em">'.$value['periodo'] .'</td>
            </tr>';
    }
$html.='<tr>
          <td style="width:60%; text-align:left"></td>
          <td style="width:20%; text-align:center"></td>
          <td style="width:20%; text-align:center"></td>
        </tr>
</table><br/>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

switch($data[0]['users']['bachillerato'] ) {
    case 2:
            $html = '
            <br/>
            <table>
                <tr>
                    <td style="width:24%">Años de bachillerato</td>
                    <td style="width:14%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                    <td style="width:10%; vertical-align:middle">2 años</td>
                    <td style="width:16%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                    <td style="width:10%; vertical-align:middle">3 años</td>        
                </tr>
            </table>';
        break;
    
    default:
         $html = '
         <br/>
         <table>
                <tr>
                    <td style="width:24%">Años de bachillerato</td>
                    <td style="width:14%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                    <td style="width:10%; vertical-align:middle">2 años</td>
                    <td style="width:16%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                    <td style="width:10%; vertical-align:middle">3 años</td>        
                </tr>
            </table>';
        break;
}

$pdf->writeHTML($html, true, false, true, false, '');

if (!empty($data[0]['becas']['name']) && !empty($data[0]['becas']['duracion'])) {
	$html = '
            <br/>
            <table>
                <tr>
                    <td style="width:60%">¿Ha obtenido algún tipo de beca durante sus estudios?</td>
                    <td style="width:8%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                    <td style="width:10%; vertical-align:middle">Sí</td>
                    <td style="width:6%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                    <td style="width:10%; vertical-align:middle">No</td>
                </tr>
            </table>';
}else{
	$html = '
        <br/>
        <table>
            <tr>
                <td style="width:60%">¿Ha obtenido algún tipo de beca durante sus estudios?</td>
                <td style="width:8%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:middle">Sí</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:10%; vertical-align:middle">No</td>
            </tr>
        </table>';
}

$pdf->writeHTML($html, true, false, true, false, '');

$html  ='<table cellspacing="0" cellpadding="2">
        <tr>';
$html .='<td style="width:25%">Entidad que se la otorgó: </td>';
$html .='<td style="width:25%;text-decoration:underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data[0]['becas']['name'] .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
$html .='<td style="width:13%">Duración:</td>';
$html .='<td style="text-decoration:underline; width:20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data[0]['becas']['duracion'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
$html .='<td style="width:17%"></td>';
$html .='</tr>
     </table>';
$pdf->writeHTML($html, true, false, true, false, '');

switch ($data[0]['users']['ingles'] ) {
    case 1:
    $html = '
        <table>
            <tr>
                <td style="width:28%">Dominio del idioma inglés</td>
                <td style="width:8%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel básico</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel medio</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel alto</td>
            </tr>
        </table>';        
        break;
    case 2:
    $html = '
        <table>
            <tr>
                <td style="width:28%">Dominio del idioma inglés</td>
                <td style="width:8%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel básico</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel medio</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel alto</td>
            </tr>
        </table>';
        break;
    default:
        $html = '
        <table>
            <tr>
                <td style="width:28%">Dominio del idioma inglés</td>
                <td style="width:8%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel básico</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel medio</td>
                <td style="width:6%"></td>
                <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                <td style="width:14%; vertical-align:middle">Nivel alto</td>
            </tr>
        </table>';
        break;
}

$pdf->writeHTML($html, true, false, true, false, '');

$html ='Otros idiomas:<br/>
<table>
    <tr>
        <td style="border-width:1px 1px 1px 1px;">'.$data[0]['aplicaciones']['codigoPostulante'] .'</td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = '<br/>
<h2 style="text-align:center">Solicitud de admisi&oacute;n</h1>
<h3 style="color:red; text-align:center">N°  '.$data[0]['aplicaciones']['codigoPostulante'] .'</h3>
';
$pdf->writeHTML($html, true, false, true, false, '');


$html ='
<br/><div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">
        &nbsp;&nbsp;K&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;ACTIVIDADES
    </span>
</div>
<span style="margin-top:30px">Mencione las actividades extracurriculares que ha realizado como trabajo, deportes, pertenencia a clubes u organizaciones de servicio, así como honores y reconocimientos logrados.</span>
<br/><br/>';

$pdf->writeHTML($html, true, false, true, false, '');

$html = '<table border="1">
    <tr>
        <td style="width:45%;text-align:center; color:#ffffff; background-color:#000000">ACTIVIDAD</td>
        <td style="width:25%;text-align:center; color:#ffffff; background-color:#000000">INSTITUCIÓN</td>
        <td style="width:10%;text-align:center; color:#ffffff; background-color:#000000">FECHA</td>
        <td style="width:20%;text-align:center; color:#ffffff; background-color:#000000">HONOR / PUESTO</td>
    </tr>';

foreach($actividades as $key => $value)
{

$html.='<tr>
        <td style="width:45%;text-align:center; font-size:0.8em">'.$value['name'].'</td>
        <td style="width:25%;text-align:center; font-size:0.8em">'.$value['institucion'].'</td>
        <td style="width:10%;text-align:center; font-size:0.8em">'.$value['fecha'].'</td>
        <td style="width:20%;text-align:center; font-size:0.8em">'.$value['puesto'].'</td>
    </tr>';
}   

$html.='<tr>
        <td style="width:45%"></td>
        <td style="width:25%"></td>
        <td style="width:10%"></td>
        <td style="width:20%"></td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');


$html = '
<br/><br/>
Describa cuál de estas actividades (extracurriculares, personales o de trabajo) ha tenido más significado para usted, y por qué.
<br/>
<span style="text-decoration:underline">'.$data[0]['aplicaciones']['actividad'].'</span>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = '<br/><br/>
<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
    <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;L&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;ENSAYO</span>
</div>
<p style="font-weight:bold">INSTRUCCIONES</p>
<ul>
    <li>Escriba a mano, con bolígrafo y únicamente en el espacio indicado. No se aceptan ensayos en páginas adicionales</li>
    <li>Elija uno de estos dos temas de ensayo y desarrólleo en el espacio asignado.</li>
    <li>Su solicitud estará incompleta sin el ensayo</li>
</ul>
<span style="font-weight:bold">ENSAYOS</span>
<br/><br/>
<span style="font-weight:bold">TEMA A:</span>
<br/>
La vida trae muchas decepciones y satisfacciones. Comente acerca de la época de su vida en la que experimentó una gran decepción o tuvo que hacer frente a circunstancias difíciles. ¿Cómo reaccionó?.
<br/>
<span style="font-weight:bold">TEMA B:</span>
<br/>
Escoja un tema que le interese personalmente y desarróllelo, sintiéndose libre de utilizar su imaginación.';

$pdf->writeHTML($html, true, false, true, false, '');


switch ($data[0]['aplicaciones']['tema_id']) {
    case 1:
        $html = '
        <br/><br/>
        <div style="text-align:center; font-weight:bold;">ENSAYO</div>
        <br/>
            <table>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                    <td style="width:15%"> TEMA A</td>
                    <td style="width:4%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                    <td style="width:"> TEMA B</td>
                </tr>
            </table>';
        break;
        
    default:
        $html = '
        <br/><br/>
        <div style="text-align:center; font-weight:bold;">ENSAYO</div>
        <br/>
            <table>
                <tr>
                    <td style="width:30%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_unchecked.png" width="32px" height="32px">--></td>
                    <td style="width:15%"> TEMA A</td>
                    <td style="width:4%"></td>
                    <td style="width:4%"><!--<img src="images/checkbox_check.png" width="32px" height="32px">--></td>
                    <td style="width:"> TEMA B</td>
                </tr>
            </table>';
        break;
}

$pdf->writeHTML($html, true, false, true, false, '');

$html ='<span style="text-decoration:underline; text-align:justify;">'.strip_tags($data[0]['aplicaciones']['ensayo']).'</span>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<span style="text-align:center">Por este medio certifico que toda la información presentada en esta solicitud de admisión</span>
<br/>
<span style="text-align:center">y documentos que adjunto son verídicos y que los ensayos han sido escritos por mí.</span>
<br/><br/><br/>
<table>
    <tr>
        <td style="width:39%;text-decoration:underline;text-align:center">&nbsp;&nbsp;'.$data[0]['users']['name'] .'&nbsp;&nbsp;</td>
        <td style="width:6%"></td>
        <td style="width:24%;text-decoration:underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td style="width:7%"></td>
        <td style="width:24%; text-decoration:underline;text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y").'&nbsp;&nbsp;</td>
    </tr>
    <tr>
        <td style="width:39%; text-align:center">Nombre</td>
        <td style="width:6%"></td>
        <td style="width:24%; text-align:center">Firma</td>
        <td style="width:7%"></td>
        <td style="width:24%; text-align:center">Fecha</td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();




// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

// add a page
//$pdf->AddPage();
?>