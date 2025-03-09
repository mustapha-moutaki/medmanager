@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h1, h2 {
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
        border: 1px solid #000;
        padding: 10px;
        text-align: right;
    }
    .total {
        font-weight: bold;
    }
    .download-btn {
        display: block;
        width: 100%;
        max-width: 200px;
        margin: 20px auto;
        padding: 10px;
        background-color: #4CAF50; /* Green */
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .download-btn:hover {
        background-color: #45a049;
    }
</style>

<h1>Medical Bill</h1>
<h2>Patient Details</h2>
<p>Patient Name: [Patient Name]</p>
<p>Date of Birth: [Date of Birth]</p>
<p>Bill Date: [Today's Date]</p>
<p>Invoice Number: [Invoice Number]</p>
<p>Payment Status: [Paid/Unpaid]</p>

<h2>Billing Details</h2>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Charge</th>
            <th>Insurance Payment</th>
            <th>Patient Responsibility</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>[Date]</td>
            <td>[Service Description]</td>
            <td>[Amount]</td>
            <td>[Amount Paid]</td>
            <td>[Amount Due]</td>
            <td>[Notes]</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

<p class="total">Total Charge: [Total Amount]</p>
<p class="total">Insurance Payments: [Total Payments]</p>
<p class="total">Patient Balance: [Remaining Balance]</p>

<h2>Available Payment Methods</h2>
<ul>
    <li>Online Payment</li>
    <li>Cash Payment</li>
    <li>Check Payment</li>
</ul>

<p>For inquiries, please contact [Phone Number].</p>

<!-- Download Button -->
<a href="" class="download-btn">Download Bill</a>

@endsection