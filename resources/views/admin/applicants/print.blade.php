<!DOCTYPE html>
<html>
<head>
    <title>Print Application</title>

    <style>
        @page {
            size: A4;
            margin: 18mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #222;
            background: #f5f5f5;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: white;
            padding: 18mm;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 6px 0 0;
            color: #666;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin: 25px 0 12px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 6px;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
        }

        .label {
            width: 160px;
            font-weight: bold;
        }

        .value {
            flex: 1;
        }

        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            width: 45%;
            text-align: center;
            margin-top: 50px;
        }

        .line {
            border-top: 1px solid #000;
            padding-top: 8px;
        }

        .no-print {
            margin: 20px auto;
            width: 210mm;
            text-align: right;
        }

        .print-btn {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        @media print {
            body {
                background: white;
            }

            .no-print {
                display: none;
            }

            .page {
                margin: 0;
                padding: 0;
                width: auto;
                min-height: auto;
            }
        }
    </style>
</head>
<body>

<div class="no-print">
    <button onclick="window.print()" class="print-btn">
        Print / Save as PDF
    </button>
</div>

<div class="page">

    <div class="header">
        <h1>Job Application Form</h1>
        <p>Applicant Information</p>
    </div>

    <div class="section-title">
        Personal Information
    </div>

    <div class="info-row">
        <div class="label">Full Name:</div>
        <div class="value">{{ $applicant->fullname }}</div>
    </div>

    <div class="info-row">
        <div class="label">Email:</div>
        <div class="value">{{ $applicant->email }}</div>
    </div>

    <div class="info-row">
        <div class="label">Phone:</div>
        <div class="value">{{ $applicant->phone }}</div>
    </div>

    <div class="info-row">
        <div class="label">Address:</div>
        <div class="value">{{ $applicant->address }}</div>
    </div>

    <div class="section-title">
        Application Information
    </div>

    <div class="info-row">
        <div class="label">Department:</div>
        <div class="value">{{ $applicant->department->name }}</div>
    </div>

    <div class="info-row">
        <div class="label">Status:</div>
        <div class="value">{{ ucfirst($applicant->status) }}</div>
    </div>

    <div class="info-row">
        <div class="label">Applied Date:</div>
        <div class="value">{{ $applicant->created_at->format('d/m/Y') }}</div>
    </div>

    <div class="section-title">
        Documents
    </div>

    <div class="info-row">
        <div class="label">Resume:</div>
        <div class="value">
            {{ $applicant->resume ? $applicant->resume : '-' }}
        </div>
    </div>

    <div class="info-row">
        <div class="label">Transcript:</div>
        <div class="value">
            {{ $applicant->transcript ? $applicant->transcript : '-' }}
        </div>
    </div>

    <div class="footer">
        <div class="signature">
            <div class="line">
                Applicant Signature
            </div>
        </div>

        <div class="signature">
            <div class="line">
                HR / Admin Signature
            </div>
        </div>
    </div>

</div>

</body>
</html>
