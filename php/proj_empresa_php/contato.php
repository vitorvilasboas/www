<div class="coluna col5 sidebar">
    <h3> localização </h3>
    <img src="imagens/mapa.jpg" alt="imagem">
    <ul class=" sem-marcador sem-padding">
        <li> Rua Machado de Assis, 121 </li>
        <li> Bairro: Mata Velha </li>
        <li> Possibilândia - UF </li>

    </ul>
    <h3> Contado Direto </h3>
    <ul class=" sem-marcador sem-padding">
        <li> Whatsapp: <strong> (99) 9 9999-9999</strong> </li>
        <li> Email: noriosmenilson@gmail.com </li>
        <li> Skype: login.skype </li>

    </ul>
</div>

<div class="coluna col7 contato">
    <h2> Envie sua Mensagem: </h2>
    <form action="">
        <label for="nome"> Seu nome: </label>
        <input type="text" name="nome" id="nome"
                placeholder="Digite o seu nome aqui "
                onfocus="this.style.background = '#BFDCFF '" 
                onblur="this.style.background = '#FFF'" 
                required />
        <label for="email"> Seu email: </label>
        <input type="text" name="email" id="email"
                placeholder="Digite o seu email aqui "
                onfocus="this.style.background = '#BFDCFF '" 
                onblur="this.style.background = '#FFF'" 
                required />
        <label for="assunto"> Assunto: </label>
        <input type="text" name="assunto" id="assunto"
                placeholder="Digite o assunto aqui "
                onfocus="this.style.background = '#BFDCFF '" 
                onblur="this.style.background = '#FFF'" 
                required />
        <label for="mensagem"> Mensagem: </label>
        <textarea name="mensagem" id="mensagem"
                    placeholder="Digite sua mensagem aqui"
                    onfocus="this.style.background = '#BFDCFF '" 
                    onblur="this.style.background = '#FFF'" 
                    required >
        </textarea>
        <input type="submit" class="botao" name="enviar" value="Enviar Mensagem &raquo; "/>
    </form>
</div>
