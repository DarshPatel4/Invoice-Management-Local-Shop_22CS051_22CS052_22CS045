<!-- <h1>Dashboard</h1>
<div class="dashboard-cards">
    <div class="card card-green">
        <div class="card-content">
            <div class="card-number">1650</div>
            <div class="card-text">Sales Amount</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>
    <div class="card card-purple">
        <div class="card-content">
            <div class="card-number">9</div>
            <div class="card-text">Total Invoices</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-print"></i>
        </div>
    </div>
    <div class="card card-orange">
        <div class="card-content">
            <div class="card-number">5</div>
            <div class="card-text">Pending Bills</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-spinner"></i>
        </div>
    </div>
    <div class="card card-red">
        <div class="card-content">
            <div class="card-number">1477</div>
            <div class="card-text">Due Amount</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
    </div>
    <div class="card card-blue">
        <div class="card-content">
            <div class="card-number">9</div>
            <div class="card-text">Total Products</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-box"></i>
        </div>
    </div>
    <div class="card card-pink">
        <div class="card-content">
            <div class="card-number">10</div>
            <div class="card-text">Total Customers</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-users"></i>
        </div>
    </div>
    <div class="card card-teal">
        <div class="card-content">
            <div class="card-number">4</div>
            <div class="card-text">Paid Bills</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-file-invoice-dollar"></i>
        </div>
    </div>
</div> -->
<?php
include('db_connection.php');

// Query to get total sales amount (sum of all paid invoices)
$sales_query = "SELECT SUM(total_amount) AS total_sales FROM invoices WHERE invoice_status = 'Paid'";
$sales_result = $conn->query($sales_query);
$sales_row = $sales_result->fetch_assoc();
$total_sales = $sales_row['total_sales'] ?? 0;

// Query to get total number of invoices
$total_invoices_query = "SELECT COUNT(*) AS total_invoices FROM invoices";
$total_invoices_result = $conn->query($total_invoices_query);
$total_invoices_row = $total_invoices_result->fetch_assoc();
$total_invoices = $total_invoices_row['total_invoices'];

// Query to get total pending bills (invoices that are unpaid)
$pending_bills_query = "SELECT COUNT(*) AS pending_bills FROM invoices WHERE invoice_status = 'Open'";
$pending_bills_result = $conn->query($pending_bills_query);
$pending_bills_row = $pending_bills_result->fetch_assoc();
$pending_bills = $pending_bills_row['pending_bills'];

// Query to get total due amount (sum of all unpaid invoices)
$due_amount_query = "SELECT SUM(total_amount) AS due_amount FROM invoices WHERE invoice_status = 'Open'";
$due_amount_result = $conn->query($due_amount_query);
$due_amount_row = $due_amount_result->fetch_assoc();
$due_amount = $due_amount_row['due_amount'] ?? 0;

// Query to get total number of customers
$total_customers_query = "SELECT COUNT(*) AS total_customers FROM customers";
$total_customers_result = $conn->query($total_customers_query);
$total_customers_row = $total_customers_result->fetch_assoc();
$total_customers = $total_customers_row['total_customers'];

// Query to get total number of paid bills
$paid_bills_query = "SELECT COUNT(*) AS paid_bills FROM invoices WHERE invoice_status = 'Paid'";
$paid_bills_result = $conn->query($paid_bills_query);
$paid_bills_row = $paid_bills_result->fetch_assoc();
$paid_bills = $paid_bills_row['paid_bills'];

// Query to get total number of products
$total_products_query = "SELECT COUNT(*) AS total_products FROM products";
$total_products_result = $conn->query($total_products_query);
$total_products_row = $total_products_result->fetch_assoc();
$total_products = $total_products_row['total_products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your CSS file here -->
</head>
<body>
<h1>Dashboard</h1>
<div class="dashboard-cards">
        <div class="card card-green">
        <div class="card-content">
            <div class="card-number"><?php echo $total_sales; ?></div>
            <div class="card-text">Sales Amount</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>


    <div class="card card-purple">
        <div class="card-content">
            <div class="card-number"><?php echo $total_invoices; ?></div>
            <div class="card-text">Total Invoices</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-print"></i>
        </div>
    </div>
    <div class="card card-orange">
        <div class="card-content">
            <div class="card-number"><?php echo $pending_bills; ?></div>
            <div class="card-text">Pending Bills</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-spinner"></i>
        </div>
    </div>
    <div class="card card-red">
        <div class="card-content">
            <div class="card-number"><?php echo $due_amount; ?></div>
            <div class="card-text">Due Amount</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
    </div>
    <div class="card card-blue">
        <div class="card-content">
            <div class="card-number"><?php echo $total_products; ?></div>
            <div class="card-text">Total Products</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-box"></i>
        </div>
    </div>
    <div class="card card-pink">
        <div class="card-content">
            <div class="card-number"><?php echo $total_customers; ?></div>
            <div class="card-text">Total Customers</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-users"></i>
        </div>
    </div>
    <div class="card card-teal">
        <div class="card-content">
            <div class="card-number"><?php echo $paid_bills; ?></div>
            <div class="card-text">Paid Bills</div>
        </div>
        <div class="card-icon">
            <i class="fas fa-file-invoice-dollar"></i>
        </div>
    </div>


<!--  -->
    </div>
</body>
</html>
