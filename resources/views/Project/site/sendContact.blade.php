<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <style type="text/css">
        <!--
        .texto, span, p, div {FONT-SIZE: 12pt; COLOR: #666666; FONT-FAMILY: Tahoma, Geneva, sans-serif !important; }
        .style1 {color: #2f80d4 !important; }
        a {text-decoration: none; color: #2f80d4 !important;}
        label {color: #2f80d4 !important;}
        -->
    </style>
</head>
<body>
<p><img alt="{{ ENV('APP_NAME') }}" src="{{ ENV('APP_URL') }}img/project-icon.png"/><strong style="font-size: 30px; color: black;">{{ ENV('APP_NAME') }}</strong><br><br></p>

<p>Olá.</p><br/>

<p>Você recebeu uma nova mensagem do site {{ ENV('APP_NAME') }}, segue dados da mensagem.</p>

<br/>
<p><label>Nome:</label> {{ $data['name'] }}</p>
<p><label>Email:</label> {{ $data['email'] }}</p>
<p><label>Mensagem:</label> {{ $data['message'] }}</p>

<br/>
<br/>
<p><font color="#2f80d4" style="font-size:10px">Copyright © {{ ENV('APP_NAME') }}</font></p>

</body>
</html>