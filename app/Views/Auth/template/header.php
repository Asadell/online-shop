<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
    }
  </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            coralRed: '#FF6452',
            accentColor: '#e55a49',
            darkShade: '#333333',
            lightShade: '#666666',
          },
          backgroundImage: {
            'hero-login': "url('<?=BASEURL.'/img/auth/hero-login.png' ?>')",
            'hero-register': "url('<?=BASEURL.'/img/auth/hero-register.jpg' ?>')",
          },
        }
      }
    }
  </script> 
</head>
<body>