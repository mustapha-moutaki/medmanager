<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>419 Page Expired</title>
  <style>
      body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
          font-family: Arial, sans-serif;
          background-color: #f8f9fa;
          color: #343a40;
          text-align: center;
      }

      .container {
          position: relative;
          animation: fadeIn 1s ease-in-out;
      }

      h1 {
          font-size: 10rem;
          margin: 0;
          animation: bounce 1s infinite;
      }

      p {
          font-size: 1.5rem;
          margin: 20px 0;
      }

      a {
          text-decoration: none;
          color: #007bff;
          font-weight: bold;
          transition: color 0.3s;
      }

      a:hover {
          color: #0056b3;
      }

      @keyframes bounce {
          0%, 20%, 50%, 80%, 100% {
              transform: translateY(0);
          }
          40% {
              transform: translateY(-30px);
          }
          60% {
              transform: translateY(-15px);
          }
      }

      @keyframes fadeIn {
          from {
              opacity: 0;
          }
          to {
              opacity: 1;
          }
      }
  </style>
</head>
<body>
  <div class="container">
      <h1>419</h1>
      <p>Oops! Page Expired.</p>
      <p>It seems your session has expired. Please try again.</p>
      <a href="{{ url('/') }}">Go Back Home</a>
  </div>
</body>
</html>