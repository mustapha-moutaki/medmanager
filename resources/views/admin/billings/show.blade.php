@extends('layouts.app')

@section('content')
<style>
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
        background-color: #4CAF50;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        cursor: pointer;
    }
    .download-btn:hover {
        background-color: #45a049;
    }
    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }
    .form-row input {
        flex: 1;
        padding: 6px;
        min-width: 150px;
    }
</style>

<!-- Patient Info Form -->
<h2>Patient Information</h2>
<div class="form-row">
    <input type="text" id="formPatientName" placeholder="Patient Name">
    <input type="date" id="formDob" placeholder="Date of Birth">
    <input type="text" id="formInvoice" placeholder="Invoice Number">
    <select id="formPaymentStatus">
        <option value="Unpaid">Unpaid</option>
        <option value="Paid">Paid</option>
    </select>
    <button onclick="updatePatientInfo()">Apply Info</button>
</div>

<!-- PDF Content -->
<div id="billContent">
    <h1>Medical Bill</h1>
    <h2>Patient Details</h2>
    <p>Patient Name: <strong id="patientName">[Name]</strong></p>
    <p>Date of Birth: <strong id="dob">[DOB]</strong></p>
    <p>Bill Date: <strong>{{ date('Y-m-d') }}</strong></p>
    <p>Invoice Number: <strong id="invoiceNumber">[Invoice]</strong></p>
    <p>Payment Status: <strong id="paymentStatus">[Status]</strong></p>

    <h2>Billing Details</h2>
    <table id="billingTable">
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
         
        </tbody>
    </table>

    <p class="total">Total Charge: <span id="totalCharge">0.00</span></p>
    <p class="total">Insurance Payments: <span id="totalInsurance">0.00</span></p>
    <p class="total">Patient Balance: <span id="totalBalance">0.00</span></p>

    <h2>Available Payment Methods</h2>
    <ul>
        <li>Online Payment</li>
        <li>Cash Payment</li>
        <li>Check Payment</li>
    </ul>
    <p>For inquiries, please contact +212600000000.</p>
</div>

<!-- Billing Row Form -->
<h2>Add Billing Entry</h2>
<div class="form-row">
    <input type="date" id="inputDate" />
    <input type="text" placeholder="Description" id="inputDesc" />
    <input type="number" placeholder="Charge" id="inputCharge" />
    <input type="number" placeholder="Insurance Payment" id="inputInsurance" />
    <input type="number" placeholder="Patient Responsibility" id="inputPatient" />
    <input type="text" placeholder="Notes" id="inputNotes" />
    <button onclick="addEntry()">Add</button>
</div>

<!-- Download PDF Button -->
<button class="download-btn" onclick="downloadPDF()">Download Bill</button>

<!-- html2pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
    function updatePatientInfo() {
        document.getElementById('patientName').textContent = document.getElementById('formPatientName').value;
        document.getElementById('dob').textContent = document.getElementById('formDob').value;
        document.getElementById('invoiceNumber').textContent = document.getElementById('formInvoice').value;
        document.getElementById('paymentStatus').textContent = document.getElementById('formPaymentStatus').value;
    }

    function addEntry() {
        const date = document.getElementById('inputDate').value;
        const desc = document.getElementById('inputDesc').value;
        const charge = parseFloat(document.getElementById('inputCharge').value) || 0;
        const insurance = parseFloat(document.getElementById('inputInsurance').value) || 0;
        const patient = parseFloat(document.getElementById('inputPatient').value) || 0;
        const notes = document.getElementById('inputNotes').value;

        const table = document.querySelector('#billingTable tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${date}</td>
            <td>${desc}</td>
            <td>${charge.toFixed(2)}</td>
            <td>${insurance.toFixed(2)}</td>
            <td>${patient.toFixed(2)}</td>
            <td>${notes}</td>
        `;
        table.appendChild(row);

        updateTotals();
    }

    function updateTotals() {
        const rows = document.querySelectorAll('#billingTable tbody tr');
        let totalCharge = 0;
        let totalInsurance = 0;
        let totalPatient = 0;

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            totalCharge += parseFloat(cells[2].textContent) || 0;
            totalInsurance += parseFloat(cells[3].textContent) || 0;
            totalPatient += parseFloat(cells[4].textContent) || 0;
        });

        document.getElementById('totalCharge').textContent = totalCharge.toFixed(2);
        document.getElementById('totalInsurance').textContent = totalInsurance.toFixed(2);
        document.getElementById('totalBalance').textContent = totalPatient.toFixed(2);
    }

    function downloadPDF() {
        const element = document.getElementById('billContent');
        const opt = {
            margin:       0.5,
            filename:     'Medical_Bill.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save();
    }
</script>
@endsection
