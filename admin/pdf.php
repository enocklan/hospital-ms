<?php
session_start();

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "tibika";

// Create connection
$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['generate'])){
    require('./fpdf/fpdf.php');


    $Diagnosis = $_POST["Diagnosis"];
    $Prescription = $_POST["Prescription"];
    $doctorsname = $_POST["doctorsname"];
    $patientname = $_POST["patientname"];
    $title = 'MEDICAL PRESCRIPTION';
    
    class PDF extends FPDF
    {
        function Header()
        {
            // Select Arial bold 15
            $this->SetFont('Arial', 'BU', 20);
            // Move to the right
            $this->Cell(80);
            // Framed title
            $this->Cell(30, 20, 'MEDICAL PRESCRIPTION', 0, 1, 'C');
            // Line break
            $this->Ln(5);
        }
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTitle($title);
    $pdf->SetTextColor(102,102,102);
    // $w = $pdf->GetStringWidth($title)+6;
    // $pdf->SetX((210-$w)/2);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(50, 5, "Doctors Name:",0, 0);
    $pdf->SetTextColor(102,102,102);
    $pdf->Cell(50, 5, "$doctorsname",0, 1);


    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(50, 5, "Patient's Name:",0, 0);
    $pdf->SetTextColor(102,102,102);
    $pdf->Cell(50, 5, "$patientname",0, 1);

    // Add content to the PDF
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(50, 5, "Diagnosis:", 0,0 );
    $pdf->SetTextColor(102,102,102);
    $pdf->Cell(50, 5, "$Diagnosis",0, 1);

    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(50, 5, "Prescription:",0, 0);
    $pdf->SetTextColor(102,102,102);
    $pdf->Cell(50, 5, "$Prescription", 0,1 );


    // Output PDF to a file
    $pdf->Output();
    exit; // Exit to prevent any further output
}
elseif (isset($_POST['send'])){
    $patientname = $_POST["patientname"];

    $doc = $_FILES['doc']['name'];
    $path1 = "../prescriptions/";
    $doc_ext = pathinfo($doc, PATHINFO_EXTENSION);
    $doc_filename = time() . '.' . $doc_ext;

    $sql = "INSERT INTO prescriptions (	doc,patient)
                                VALUES ('$doc_filename', '$patientname')";

    if (mysqli_query($con, $sql)) {
        move_uploaded_file($_FILES['doc']['tmp_name'], $path1 . '/' . $doc_filename);
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Prescription Sent successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "server error";
        header("Location: ./doctor.php");
        exit();
    }
 

}
?>
