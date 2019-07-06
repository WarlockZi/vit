<div class="overlay"></div>

<div class="messageBox">
	<div class="messageTitleBar">
		<div class="messageTitle">Сообщение</div>
	</div>
	
	<div class="msg">
		<? foreach ($msg as $k => $Msg):?>
			<div class="msgText">- <?=$Msg?></div>
		<? endforeach;?>
	</div>
	<div class="messageClose">Закрыть</div>
</div>