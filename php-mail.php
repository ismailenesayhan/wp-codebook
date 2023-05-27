<?php
$namePost = $emailPost = $subjectPost = $servicesPost = "";
$send_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namePost = test_input($_POST['isim']);
        $emailPost = test_input($_POST['eposta']);
        $subjectPost = test_input($_POST['konu']);

        $serviceWeb = test_input($_POST['web']);
        $serviceMobile = test_input($_POST['mobile']);
        $serviceUI = test_input($_POST['ui']);
        $serviceBrand = test_input($_POST['brand']);
        $serviceFrontEnd = test_input($_POST['front-end']);
        $serviceDigital = test_input($_POST['digital']);
        $serviceCommerce = test_input($_POST['e-commerce']);
        $serviceHosting = test_input($_POST['hosting']);
        $serviceOther = test_input($_POST['other']);
}

function test_input($data)
{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

if (empty($_POST['name']) && !empty($_POST['isim']) && !empty($_POST['eposta'])) {
        http_response_code(200);

        $to = "enes@iea.wf";
        $subject = $namePost . " - Web Sitesi İletişim Formu";
        $message = '
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    </style>
    </head>
    <table border="0">
            <tr>
                <td>İsim</td>
                <td>' . $namePost . '</td>
            </tr>
            <tr>
                <td>E-Posta</td>
                <td>' . $emailPost . '</td>
            </tr>
            <tr>
                <td>Mesaj</td>
                <td>' . $subjectPost . '</td>
            </tr>
    </table>

    <table border="0">
     <tr>
        <td><strong>Hizmetler:</strong</td>
    </tr>
        ' . (($serviceWeb == "true")    ? "<tr><td>Web Sitesi</td></tr>" : "") . (($serviceMobile == "true") ? "<tr><td>Mobil Uygulama</td></tr>" : "") . (($serviceUI == "true")     ? "<tr><td>UI & UX</td></tr>" : "") . (($serviceBrand == "true")  ? "<tr><td>Marka & Kurumsal Kimlik</td></tr>" : "") . (($serviceFrontEnd == "true") ? "<tr><td>Front-End</td></tr>" : "") . (($serviceDigital == "true") ? "<tr><td>Dijital Pazarlama</td></tr>" : "") . (($serviceCommerce == "true") ? "<tr><td>E-Ticaret</td></tr>" : "") . (($serviceHosting == "true") ? "<tr><td>Hosting & DNS</td></tr>" : "") . (($serviceOther == "true") ? "<tr><td>Diğer</td></tr>" : "") . '
   </table>
    </body>
    </html>
    ';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <ieawf@iea.wf>' . "\r\n";
        $send_email = mail($to, $subject, $message, $headers);
}

if ($send_email) {
        $response = ['status' => 'success'];
} else {
        $response = ['status' => 'error'];
}

echo json_encode($response);
