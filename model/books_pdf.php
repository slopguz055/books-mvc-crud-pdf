<?php
require('PDF_MySQL_Table.php');
require_once 'Database.php';
class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial', '', 18);
        $this->Cell(0, 6, utf8_decode('Books PDF'), 0, 1, 'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Connect to database
$link = Database::connect();

$pdf = new PDF();
$pdf->AddPage();

$pdf->AddCol('title', 90, 'Title');
$pdf->AddCol('isbn', 30, 'Isbn');
$pdf->AddCol('author', 40, 'Author');
$pdf->AddCol('pages', 15, 'Pages');
$prop = array(
    'HeaderColor' => array(255, 229, 102),
    'color1' => array(229, 255, 204),
    'color2' => array(255, 255, 204),
    'padding' => 1
);
$pdf->Table($link, 'SELECT title, isbn, author, pages FROM books ORDER BY title', $prop);

$pdf->Output();
?>
