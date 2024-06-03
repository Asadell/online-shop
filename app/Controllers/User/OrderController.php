<?php


use App\Core\BaseController;
use App\Core\Message;
use App\Controllers\ValidationController;
use App\Core\fpdf186\FPDF;

class PDF extends FPDF {
  function Header() {
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(0, 10, 'Asadeal', 0, 1, 'L');
    $this->Ln(10);
}

  function Footer() {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
  }
}

class OrderController extends BaseController{
  private $userModel;
  private $orderModel;
  public function __construct() {
    $this->userModel = $this->model('User/', 'UserModel');
    $this->orderModel = $this->model('User/', 'OrderModel');
  }
  
  public function index(){
    if(!(new ValidationController)->checkLogin('CUSTOMER')){
      $this->redirect('login');
    }
    $data = [
      'title' => 'order',
    ];
    $this->view('User/order/index', $data);
  }

  public function download($id) {
    $idUser = $_SESSION['id_user'];
    $user = $this->userModel->getUserById($idUser);
    $order = $this->orderModel->getOrderById($id);
    $orderDetail = $this->orderModel->getOrderDetailById($id);
    $pdf = new PDF();
    $pdf->AddPage('P', 'A4');
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetAutoPageBreak(true, 10);

    $pdf->MultiCell(95, 10, "Order ID: ".$order['no_resi']."\nOrder Status: ".$order['status']."", 1, 'L');
    $pdf->SetXY(105, $pdf->GetY() - 20); 
    $pdf->MultiCell(95, 10, "Payment Method: ".$order['provider']."\nDate Added: ".date('d-m-Y', strtotime($order['order_date']))."", 1, 'L');
    
    $pdf->Ln(10);
    
    $pdf->MultiCell(95, 10, "Account Information\nName: ".$user['full_name']."\nEmail: ".$user['email']."", 1, 'L');
    $pdf->SetXY(105, $pdf->GetY() - 30); 

    $pdf->MultiCell(95, 10, "Purchase Information\nAddress: ".$order['shipping_address']."\nStore Name: Store", 1, 'L');

    $pdf->Ln(10);

    $pdf->Cell(10, 10, 'No', 1);
    $pdf->Cell(80, 10, 'Product Name', 1);
    $pdf->Cell(30, 10, 'Price', 1);
    $pdf->Cell(20, 10, 'Qty', 1);
    $pdf->Cell(50, 10, 'Subtotal', 1);
    $pdf->Ln();

    $no = 0;
    foreach ($orderDetail as $row) {
        $pdf->Cell(10, 10, $no++, 1);
        $pdf->Cell(80, 10, $row['name'], 1);
        $pdf->Cell(30, 10, number_format(($row['price']), 0, ',', '.'), 1);
        $pdf->Cell(20, 10, $row['qty'], 1);
        $pdf->Cell(50, 10, number_format(($row['price']*$row['qty']), 0, ',', '.'), 1);
        $pdf->Ln();
    }

    $pdf->Ln(10);

    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(50, 10, "Subtotal: Rp. ".number_format(($order['total_price']), 0, ',', '.')."", 1, 1, 'R');
    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(50, 10, 'Discount: Rp. 0', 1, 1, 'R');
    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(50, 10, 'Tax: Rp. 0', 1, 1, 'R');
    $pdf->Cell(140, 10, '', 0);
    $pdf->Cell(50, 10, "Total: Rp. ".number_format(($order['total_price']), 0, ',', '.')."", 1, 1, 'R');

    $pdf->Output('F', 'filename.pdf');
    $pdf->Output('D', 'filename.pdf');
  }
}