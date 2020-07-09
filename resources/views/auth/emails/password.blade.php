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
<p><img alt="{{ ENV('APP_NAME') }}" src="{{ ENV('APP_URL') }}/img/project-icon.png"/><strong style="font-size: 30px; color: black;">{{ ENV('APP_NAME') }}</strong><br><br></p>

<p>Olá.</p><br/>

<p>Você solicitou um email de troca de senha no site {{ ENV('APP_NAME') }}. Clique no link abaixo para recuperar sua senha. Caso não tenha feito nenhuma solicitação desconsidere este email.</p>

<br/>
<p><b><font color="#2f80d4"><a target="_blank" href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">CLIQUE AQUI PARA RECUPERAR SUA SENHA</a></font></b></p><br/><br/>

<p style="font-size:12px">Caso o link acima não funcione, copie esta url e cole na barra de endereços do seu navegador:<br/><label>{{ $link  }}</label></p>

<br/>
<br/>
<p><font color="#2f80d4" style="font-size:10px">Copyright © {{ ENV('APP_NAME') }}</font></p>

</body>
</html>
