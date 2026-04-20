<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>جارٍ تحسين الموقع</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Tahoma, Arial;
    }

    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #fff;
      overflow: hidden;
    }

    .container {
      text-align: center;
      padding: 30px;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.05);
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 90%;
      animation: fadeIn 1.2s ease;
    }

    h1 {
      font-size: 28px;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      opacity: 0.8;
      margin-bottom: 25px;
    }

    .loader {
      width: 60px;
      height: 60px;
      border: 6px solid rgba(255, 255, 255, 0.2);
      border-top: 6px solid #00eaff;
      border-radius: 50%;
      margin: 0 auto;
      animation: spin 1s linear infinite;
    }

    .dots {
      margin-top: 15px;
      font-size: 22px;
      letter-spacing: 5px;
    }

    .dots span {
      animation: blink 1.5s infinite;
    }

    .dots span:nth-child(2) {
      animation-delay: 0.2s;
    }

    .dots span:nth-child(3) {
      animation-delay: 0.4s;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @keyframes blink {

      0%,
      80%,
      100% {
        opacity: 0;
      }

      40% {
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .footer {
      margin-top: 20px;
      font-size: 13px;
      opacity: 0.6;
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 22px;
      }

      p {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>🚧 جارٍ تحسين الموقع</h1>
    <p>نقوم حاليًا ببعض التحديثات لتحسين تجربتك، سنعود قريبًا!</p>

    <div class="loader"></div>

    <div class="dots">
      <span>.</span>
      <span>.</span>
      <span>.</span>
    </div>

    <div class="footer">شكراً لصبرك ❤️</div>
  </div>

  <script>
    // تغيير الرسالة كل شوية
    const messages = [
      "جارٍ تحسين الأداء...",
      "تحديثات جديدة قادمة...",
      "نجهز تجربة أفضل لك...",
      "قريباً هنرجع أقوى 💪",
    ];

    let index = 0;
    const p = document.querySelector("p");

    setInterval(() => {
      index = (index + 1) % messages.length;
      p.textContent = messages[index];
    }, 3000);
  </script>
</body>

</html>