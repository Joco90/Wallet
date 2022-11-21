<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title>Email/html</title>
</head>
<body>
    <style>
                * { margin: 0; padding: 0; font-size: 100%; font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; line-height: 1.65; }

        img { max-width: 100%; margin: 0 auto; display: block; }

        body, .body-wrap { width: 100% !important; height: 100%; background: #f8f8f8; }

        a { color: #71bc37; text-decoration: none; }

        a:hover { text-decoration: underline; }

        .text-center { text-align: center; }

        .text-right { text-align: right; }

        .text-left { text-align: left; }

        .button { display: inline-block; color: white; background: #71bc37; border: solid #71bc37; border-width: 10px 20px 8px; font-weight: bold; border-radius: 4px; }

        .button:hover { text-decoration: none; }

        h1, h2, h3, h4, h5, h6 { margin-bottom: 20px; line-height: 1.25; }

        h1 { font-size: 32px; }

        h2 { font-size: 28px; }

        h3 { font-size: 24px; }

        h4 { font-size: 20px; }

        h5 { font-size: 16px; }

        p, ul, ol { font-size: 16px; font-weight: normal; margin-bottom: 20px; }

        .container { display: block !important; clear: both !important; margin: 0 auto !important; max-width: 580px !important; }

        .container table { width: 100% !important; border-collapse: collapse; }

        .container .masthead { padding: 80px 0; background: #ffc107; color: white; }

        .container .masthead h1 { margin: 0 auto !important; max-width: 90%; text-transform: uppercase; }

        .container .content { background: white; padding: 30px 35px; }

        .container .content.footer { background: none; }

        .container .content.footer p { margin-bottom: 0; color: #888; text-align: center; font-size: 14px; }

        .container .content.footer a { color: #888; text-decoration: none; font-weight: bold; }

        .container .content.footer a:hover { text-decoration: underline; }

</style>
<table class="body-wrap">
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                        <h1>GESTION DU BUDGET...</h1>

                    </td>
                </tr>
                <tr>
                    <td class="content">

                        <h2>Bonjour  {{$data}}, </h2>

                        <p>Votre compte a été créé avec succès. <br>
                        Code Utilisateur: {{$email}} <br>
                        Mot de passe par defaut: {{$motdepass}}.</p>

                        <p>Vous devez changer ce mot de passe lors de votre prémière connexion. </p>
                        <p>Mentall Busness Group vous remercie</p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <p> <a href="https://www.mentall.net/Abouts" target="_blank">Mentall Group Busness</a>, Abidjan/Côte d'Ivoire Cocody/Angré-Château, <br> +225 25 22 00 81 08 / +225 01 02 15 05 36</p>
                        <p><strong>infos@mentall.net</strong></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

</body>
</html>
