<h1>Telegram-bot</h1>

Sistema feito sob propósito de estudo para aplicação em futuros projetos. Aqui usamos o pacote <a href="https://github.com/babenkoivan/telegram-notifications">"Telegram Notifications For Laravel" (babenkoivan/telegram-notification)</a> para enviar notificação via bot no Telegram. Também foi feito um sistema de envio de e-mail.

<h3>Recursos usados</h3>
<ul>
<li>PHP 7.4</li>
<li>Laravel 7.0</li>
<li>Bootstrap 4</li>
<li>Mysql 5.8</li>
</ul>

<h3>Uso</h3>
<p>Com ajuda do robô telegram <a href="https://telegram.me/BotFather">@BotFather</a>, crie um robô para a sua aplicação com o comando <b><i>/newbot</i></b>. Pergunte ao <a href="https://telegram.me/BotFather">@BotFather</a> pelo seu token com o comando <b><i>/mybot</i></b>.</p>
<p>Na página de boas-vindas, crie e logo com um novo usuário. Na página home, escolha o usuário cadastrado que deseja enviar a mensagem telegram, o tipo de mensagem e a mensagem em si. Ela será entregue ao destinatário pelo robô configurado.</p>

<h4>Considerações</h4>
<p><b>1)</b>Para se enviar stickers, é preciso digitar no formulário o seu id correspondente. Use o robô <a href="https://telegram.me/idstickerbot">@idstickerbot</a> para descobrir tais ids. Envie para ele um sticker e o mesmo responderá com o respectivo id.</p>
<p><b>2)</b>Para enviar imagens ou vídeos, coloque o caminho do arquivo ou URL. O telegram não consegue enviar vídeos grandes mesmo hospedados em outros sites.</p>
<p><b>3)</b>As mensagens e e-mails enviados não estão sendo armazenadas.</p>
