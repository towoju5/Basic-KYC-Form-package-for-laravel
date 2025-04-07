<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KYC Success</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #f4f6f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .card {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
    }

    .card svg {
      width: 80px;
      height: 80px;
      color: #10b981;
      margin-bottom: 20px;
    }

    .card h1 {
      font-size: 26px;
      color: #1f2937;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 16px;
      color: #4b5563;
      margin-bottom: 25px;
      line-height: 1.5;
    }

    .btn {
      display: inline-block;
      background-color: #10b981;
      color: #fff;
      padding: 12px 24px;
      border-radius: 9999px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #059669;
    }
  </style>
</head>
<body>
  <div class="card">
    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
    <h1>KYC Verification Successful</h1>
    <p>Thank you for completing your KYC. Your account is now fully verified and ready to use all our features.</p>
    <a href="/" class="btn">Go to Dashboard</a>
  </div>
</body>
</html>
