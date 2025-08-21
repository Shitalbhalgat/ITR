<?php
require('fpdf/fpdf.php');

// Database connection
$conn = new mysqli("localhost", "root", "", "school_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest certificate data
$sql = "SELECT * FROM leaving_certificates ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,10,'Leaving Certificate',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'A.E.S Bhausahab Firodiya High School, Ahmednagar',0,1,'C');
$pdf->Ln(10);

// Certificate details
function addField($pdf, $label, $value) {
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(60,10,"$label:",0,0);
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,10,$value,0,1);
}

addField($pdf, "Name of Pupil", $data['name']);
addField($pdf, "Mother's Name", $data['mother_name']);
addField($pdf, "Religion/Caste & Sub-Caste", $data['religion_caste']);
addField($pdf, "Place of Birth", $data['place_of_birth']);
addField($pdf, "Date of Birth", date("d/m/Y", strtotime($data['dob'])));
addField($pdf, "Last School Attended", $data['last_school']);
addField($pdf, "Date of Admission", date("d/m/Y", strtotime($data['admission_date'])));
addField($pdf, "Progress", $data['progress']);
addField($pdf, "Conduct", $data['conduct']);
addField($pdf, "Date of Leaving School", date("d/m/Y", strtotime($data['leaving_date'])));
addField($pdf, "Std. in which studying", $data['std']);
addField($pdf, "Since When", $data['since_when']);
addField($pdf, "Reason of Leaving School", $data['reason']);
addField($pdf, "Remarks", $data['remarks']);
addField($pdf, "Nationality", $data['nationality']);

$pdf->Ln(10);
$pdf->Cell(0,10,'Certified by: Principal, A.E.S. Bhausahab Firodiya High School, Ahmednagar',0,1);

$pdf->Output();
?>
